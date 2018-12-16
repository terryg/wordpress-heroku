#!/bin/bash

declare -a arr=("AUTH_KEY" "SECURE_AUTH_KEY" "LOGGED_IN_KEY" "NONCE_KEY" "AUTH_SALT" "SECURE_AUTH_SALT" "LOGGED_IN_SALT" "NONCE_SALT")

for k in "${arr[@]}";
do
    heroku config:set $k=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9~!@#$%^&*_-' | fold -w 64 | head -n 1)
done
    
