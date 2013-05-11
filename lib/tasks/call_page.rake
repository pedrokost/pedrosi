require 'net/http'

desc "This task wakes pedro.si from sleep every hour"
task :call_page do
	time = Time.now
	puts "Waking up pedro.si"
	uri = URI.parse('http://www.pedro.si/')
	Net::HTTP.get(uri)
	delta_time = Time.now - time
	puts "pedro.si was called. (Response time was #{"%.3f" % delta_time}s)"
 end