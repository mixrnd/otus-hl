counter = 0
paths = {'/search?firstName=Mia&lastName=Hena', '/search/city?name=Pari'}
-- print( #paths)

request = function()
  -- Get the next paths array element
  url_path = paths[counter]

  counter = counter + 1

  -- If the counter is longer than the paths array length then reset it
  if counter > #paths then
    counter = 0
  end
  -- print(url_path)
  -- Return the request object with the current URL path
  return wrk.format(nil, url_path)
end