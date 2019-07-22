#!/bin/bash
rsync --verbose  --progress --stats --compress --rsh=/usr/bin/ssh \
      --recursive --links --no-perms --no-owner --no-group  --exclude-from=exclude \
      ./ doteveryone@webarch1.co.uk:/home/doteveryone/sites/default/
