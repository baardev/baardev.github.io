# Outputs "hello"
# Usage: Read this in about {{ page.content | reading_time }}

module HelloFilter
	def hello( )
		puts "hello"
	end
end

Liquid::Template.register_filter(HelloFilter)
