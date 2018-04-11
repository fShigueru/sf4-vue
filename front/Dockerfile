FROM nginx:1.10.2
MAINTAINER Filipe Shigueru <filipe.shigueru@yahoo.com.br>
RUN apt-get update

RUN apt-get install vim -y

RUN apt-get install nodejs -y

RUN apt-get install npm -y

RUN apt-get install git -y

# Curl
RUN apt-get install curl -y
RUN apt-get install apt-transport-https -y

RUN npm cache clean -f
RUN npm install -g n
RUN n stable

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update && apt-get install yarn -y

RUN npm install -g yarn

RUN npm install -g gulp

RUN npm install create-react-app -g

RUN npm install -g vue-cli

EXPOSE 3000
EXPOSE 35729