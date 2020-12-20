#!/usr/bin/env bash
echo "Creando imagen starter/web"
docker build -t starter:web -f Dockerfile-web .
