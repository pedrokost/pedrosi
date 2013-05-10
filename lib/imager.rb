require 'base64'
require 'RMagick'
include Magick
 
module Imager
 
    class << self
        def registered(app)
            app.send :include,  InstanceMethods
            app.ready do
                sitemap.register_resource_list_manipulator(
                    :imager,
                    @app.image_manager,
                    false
                )
                # How can we call this instance method from within a helper?
                # image "middleman.png", :resize_to_fit => '200x80'
            end
        end
        alias :included :registered
    end
 
    module InstanceMethods
        def image_manager
            @_image_manager ||= ImageManager.new(self)
        end
 
        def images
          image_manager.images
        end
    end
 
    class ImageManager
        def initialize(app)
            @app        = app
            # would be cool if this worked as a normal class variable, instead of @app
            @images = {}
        end
 
        def image(name, options={})
            @images[name] = options
            @app.sitemap.rebuild_resource_list!(:added_image)
        end
 
        def manipulate_resource_list(resources)
            resources + @images.map do |name, options|
                i = ImageObject.new(
                    @app.sitemap,
                    name,
                    options)
                i
            end
        end
    end
 
    class ImageObject < Middleman::Sitemap::Resource
        def initialize(store, name, options)
            @name = name
            @options = options
 
            path = "images/compiled/#{name}"
            super(store, path, source_file)
            read_image
        end
 
        # Pretend to be a template, so render gets called.
        def template?
            true
        end
        
        def source_file
            "source/images/#{@name}"
        end
 
        def read_image
            @_img = Magick::Image::read(source_file)[0]
        end
 
        def render
            if @options[:resize_to_fit]
                @_img.resize_to_fit!(@options[:resize_to_fit])
            end
 
            return @_img.to_blob
        end
    end
end
 
::Middleman::Extensions.register(:imager, Imager)