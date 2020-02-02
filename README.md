# Ansible webserver AWS

Using Ansible to create and configure a simple webserver on AWS

## Install Ansible

> sudo apt-get update

> sudo apt-get install software-properties-common -y

> sudo apt-add-repository --yes --update ppa:ansible/ansible

> sudo apt-get install ansible -y

## Create a Vault file with AWS credentials

> ansible-vault create group_vars/all/pass.yml

Include your AWS Key and Secret with permission to create EC2 resources

```
    ec2_access_key: [ your aws access key ]
    ec2_secret_key: [ your aws secret key ]
```

Create a second file with the following content to allow Ansible to connect to the EC2 instance(s) identified by their tags

> ansible-vault create aws_ec2.yml

With the following content:

```
plugin: aws_ec2
regions:
  - eu-west-1
filters:
  tag:Name: Webserver
aws_access_key_id: [ your aws access key ]
aws_secret_access_key: [ your aws secret key ]
```

## Dynamic Hosts

aws_ec2.yml is used to determine the host(s) to update based on the Region and a Tag added to the EC2 instance during creation.

## To create the AWS infrastructure items

> ansible-playbook playbook.yml --ask-vault-pass

## To configure the webserver once it has been created

> ansible-playbook -i aws_ec2.yml webserver.yml --ask-vault-pass

or

> ansible-playbook -i aws_ec2.yml webserver.yml --vault-password-file=vault_password