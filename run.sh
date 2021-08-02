#!/bin/bash

docker build -t avsilnic/request_handler:v1 .
docker run -t -w /var/www/request_handler -i avsilnic/request_handler:v1 /bin/bash
