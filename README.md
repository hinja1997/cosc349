# cosc349 Assignment 2
Jasmine Hindson - 8148181

This repository contains everything that I am submitting for Assignment 2.

My project is an application that converts the current NZ date into one of the following languages - Italian, Spanish, French, and Portugese. The application uses 2 Virtual Machines which are web servers being hosted by AWS as instances and I am also using a AWS database - RDS to assist the 2 web servers.

To run the application, first download the zip file. After the file has downloaded, navigate to the folder within terminal. Before typing the command 'vagrant up', you will need to initialise the credentials file in the file path '~/.aws'. To do this, type in 'cd ~/.aws' into terminal. If the file does not exist, then type 'cd ~/' first, and then 'mkdir .aws'. This command creates the directory '.aws'. Once the directory exists, create a file called credentials by typing 'nano credentials' into terminal whilst in the directory '/.aws'. In this credentials file, you will need the key's obtained from 'Account Details' that can be found on AWS Workbench (this requires logging into a AWS educate account). Copy the information and paste it into the file we just created 'credentials'. Once this is done, navigate back to the folder with the Vagrantfile and type into terminal these 3 commands with the corresponding values from the credentials file:
export AWS_ACCESS_KEY_ID=
export AWS_SECRET_ACCESS_KEY=
export AWS_SESSION_TOKEN=

Once you have done this, type 'vagrant up --provider=aws' into terminal.
