from fabric.api import *
import socket
import paramiko
import string

def is_host_up(host):
    original_timeout = socket.getdefaulttimeout()
    socket.setdefaulttimeout(1)
    host_up = True
    try:
        paramiko.Transport((host,22))
    except Exception, e:
        host_up = False
    finally:
        socket.setdefaulttimeout(original_timeout)
        return host_up

@task
@parallel
def reboot():
    if is_host_up(env.host):
        sudo("shutdown -r 0")

@task
@parallel
def shutdown():
    if is_host_up(env.host):
        sudo("shutdown -P 0")

@task
@parallel
def update():
    if is_host_up(env.host):
        sudo("apt-get update")

@task
@parallel
def upgrade():
    if is_host_up(env.host):
        sudo("apt-get update")
        sudo("apt-get -y upgrade")

@task
@parallel
def dist_upgrade():
    if is_host_up(env.host):
        sudo("apt-get update")
        sudo("apt-get -y dist-upgrade")

@task
@parallel
def install(package):
    if is_host_up(env.host):
        #sudo("apt-get update")
        sudo("apt-get -y install %s" % package)

@task
@parallel
def remove(package):
    if is_host_up(env.host):
        #sudo("apt-get update")
        sudo("apt-get -y remove %s" % package)

@task
@parallel
def update_info():
    if is_host_up(env.host):
        #sudo("apt-get update")
        sudo("commander-client")