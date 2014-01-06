require 'base64'
require 'RMagick'

helpers do
  def image(name, options={})
    if options[:path_given]
      path = name
    else
      path = "source/images/#{name}"
    end
    img  = Magick::Image::read(path)[0]

    resized_img_name = "thumbnail_compiled.png"
    # resize to a fixed width when needed
    if options[:width]
      img.resize_to_fill!(options[:width])
      resized_img_name = "thumbnail_compiled_#{options[:width]}.png"
    end
    if options[:path_given]
      save_to_dir = "#{options[:save_to_dir]}"
    else
      save_to_dir = "/images/#{options[:save_to_dir]}"

    end
    load_from_dir = "#{options[:load_from_dir]}"
    img.write "source/#{save_to_dir}#{resized_img_name}"

    alt = "alt=\"#{options[:alt]}\"" if options[:alt]
    width = "width=\"#{options[:width]}\"" if options[:width]
    data = Base64.encode64(img.to_blob)
    # str  = "<img src=\"\"/>"

    # str = "<img #{alt} #{width} src=\"data:image/jpeg;base64,#{data}\"/>"
    str = "<img #{alt} #{width} src=\"#{load_from_dir}#{resized_img_name}\"/>"
    str.gsub!(/\n/, '')
    str
  end

  def image_for(article, options={})
    path = article.eponymous_directory_path
    # /
    img = Dir.glob("source/#{path}thumbnail.{jpg,jpeg,png,JPG,JPEG,PNG}")[0]

    if img
      options[:path_given] = true
      options[:save_to_dir] = "#{path}"
      options[:load_from_dir] = article.url
      return image(img, options)
    else
      return
    end
  end
end

activate :blog do |blog|
  blog.prefix = "labs"
  blog.permalink = ":year/:title/index.html"
  blog.sources = "/labs/:year-:month-:day-:title.html"
  # blog.taglink = "tags/:tag.html"
  blog.layout = "experiment_layout"
  # blog.summary_separator = /(READMORE)/
  # blog.summary_length = 250
  # blog.year_link = ":year.html"
  # blog.month_link = ":year/:month.html"
  # blog.day_link = ":year/:month/:day.html"
  blog.default_extension = ".erb"

  # blog.tag_template = "tag.html"
  # blog.calendar_template = "calendar.html"

  # blog.paginate = true
  # blog.per_page = 10
  # blog.page_link = "page/:num"
end

###
# Compass
###

# Susy grids in Compass
# First: gem install compass-susy-plugin
# require 'susy'

# Change Compass configuration
# compass_config do |config|
#   config.output_style = :compact
# end

###
# Page options, layouts, aliases and proxies
###
page "*", layout: :full_layout
# page "/feed.xml", :layout => false
# Per-page layout changes:
#
# With no layout
# page "/path/to/file.html", :layout => false
#
# With alternative layout
# page "/path/to/file.html", :layout => :otherlayout
#
# A path which all have the same layout
# with_layout :admin do
#   page "/admin/*"
# end

# Proxy (fake) files
# page "/this-page-has-no-template.html", :proxy => "/template-file.html" do
#   @which_fake_page = "Rendering a fake page with a variable"
# end

###
# Helpers
###

# Automatic image dimensions on image_tag helper
# activate :automatic_image_sizes

# Methods defined in the helpers block are available in templates
# helpers do
#   def some_helper
#     "Helping"
#   end
# end

set :css_dir, 'stylesheets'

set :js_dir, 'javascripts'

set :images_dir, 'images'

# Build-specific configuration
configure :build do
  # For example, change the Compass output style for deployment
  activate :minify_css

  # Minify Javascript on build
  activate :minify_javascript

  activate :minify_html

  # Enable cache buster
  activate :cache_buster

  # Use relative URLs
  # activate :relative_assets

  # Compress PNGs after build
  # First: gem install middleman-smusher
  # require "middleman-smusher"
  # activate :smusher

  # Or use a different image path
  # set :http_path, "/Content/images/"
end

# activate :livereload

# silence i18n warning
::I18n.config.enforce_available_locales = false