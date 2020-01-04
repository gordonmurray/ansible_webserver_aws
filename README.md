# Ansible webserver AWS
Using Ansible to create and configure a simple webserver on AWS

## Create a Vault file with AWS credentials

`ansible-vault create group_vars/all/pass.yml`

## To create the AWS infrastructure items

`ansible-playbook playbook.yml --ask-vault-pass`

## To configure the webserver once it has been created

`ansible-playbook -i aws_ec2.yml webserver.yml --ask-vault-pass`