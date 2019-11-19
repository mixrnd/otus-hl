okCounter = 0
paths = {'/search?firstName=Mia&lastName=Hena', '/search/city?name=Pari'}
-- print( #paths)

request = function()
  -- Get the next paths array element
  url_path = paths[okCounter]

  okCounter = okCounter + 1

  -- If the counter is longer than the paths array length then reset it
  if okCounter > #paths then
    okCounter = 0
  end
  -- print(url_path)
  -- Return the request object with the current URL path
  return wrk.format(nil, url_path)
end