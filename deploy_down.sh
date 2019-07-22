#!/bin/bash
rsync --verbose --progress --stats --compress --rsh=/usr/bin/ssh \
      --recursive --no-times --no-perms --links --exclude-from=exclude \
      doteveryone@webarch1.co.uk:/home/doteveryone/sites/default/ ./
