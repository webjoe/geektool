# Source: http://posts.iamawesome.net/post/21441619611/my-geektool-setup
curl --silent "http://xml.weather.yahoo.com/forecastrss?p=USWI0455&u=f" | grep -E '(Current Conditions:|F<BR)' | sed -e 's/Current Conditions://' -e 's/<br \/>//' -e 's/<b>//' -e 's/<\/b>//' -e 's/<BR \/>//' -e 's///' -e 's/<\/description>//'