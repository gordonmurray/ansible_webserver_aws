# Ansible webserver AWS
Using Ansible to create and configure a simple webserver on AWS

## To create the AWS infrastructure items

`ansible-playbook playbook.yml --ask-vault-pass`

## To configure the webserver once it has been created

`ansible-playbook webserver.yml --ask-vault-pass`

`ansible-playbook -i hosts --limit "tag_Name_Webserver" webserver.yml --ask-vault-pass`

