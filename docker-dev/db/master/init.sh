#!/bin/bash

sleep 50

echo "* Set start"

mysql -uroot -psecret -AN -e "CREATE USER 'slave_user'@'%' IDENTIFIED BY 'secret';"
mysql -uroot -psecret -AN -e "GRANT REPLICATION SLAVE ON *.* TO 'slave_user'@'%';"

mysql -uroot -psecret -AN -e "FLUSH PRIVILEGES;"

echo "* Set finish"

sudo docker run \
  --volume=/:/rootfs:ro \
  --volume=/var/run:/var/run:ro \
  --volume=/sys:/sys:ro \
  --volume=/var/lib/docker/:/var/lib/docker:ro \
  --volume=/dev/disk/:/dev/disk:ro \
  --publish=8081:8080 \
  --detach=true \
  --name=cadvisor \
  google/cadvisor:latest