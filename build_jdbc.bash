#!/bin/bash
set -e -v

./buildDatabase.bash

javac *.java
