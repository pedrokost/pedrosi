# pedro.si

Welcome to the repository of my presentational website accessible at pedro.si. 

The website in build on Middleman

## Middleman on Heroku

### Setup

    # To host a middleman app on Heroku, you need to use a custom buildpack. 
	$ heroku config:add BUILDPACK_URL=http://github.com/indirect/heroku-buildpack-middleman.git
	# ... and then republish your app so it's built.

The only expectation is that `middleman build` will generate your site into `./build`. That's where Rack::TryStatic will look.

You can customize the 404 page that's served if TryStatic can't find a file by editing `source/404.html.erb`.
