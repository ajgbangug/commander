#!/usr/bin/env python

import fabfile
import pymongo
import config

from fabric.tasks import execute
from fabric.api import *

def is_online(mac, t_id):
    connection = pymongo.Connection(config.DBSERVER, config.PORT)
    db = connection[config.DATABASE]
    db.authenticate(config.DBUSER, config.DBPASS)
    hosts = db.hosts
    details = hosts.find_one({'macaddress' : mac})
    if details != None:
        return details['online']
    else:
        tasks = db.tasks
        tasks.remove({'_id' : t_id})
        return False

if __name__ == '__main__':
    env.user = config.USER_SSH
    env.password = config.PASS_SSH
    connection = pymongo.Connection(config.DBSERVER, config.PORT)
    db = connection[config.DATABASE]
    db.authenticate(config.DBUSER, config.DBPASS)

    # do the tasks in the task queue
    tasks = db.tasks
    task_list = tasks.find({"successful" : False})
    hosts = db.hosts

    for t in task_list:
        if is_online(t['macaddress'], t['_id']):
            target = db.hosts.find_one({'macaddress': t['macaddress']}, {'ipaddress' : 1})
            env.hosts = [target['ipaddress']]
            if t['operation'] == 'shutdown':
                execute(fabfile.shutdown)
            elif t['operation'] == 'reboot':
                execute(fabfile.reboot)
            elif t['operation'] == 'upgrade':
                execute(fabfile.upgrade)
            elif t['operation'] == 'dist_upgrade':
                execute(fabfile.dist_upgrade)
            elif t['operation'] == 'update':
                execute(fabfile.update)
            elif t['operation'] == 'update_info':
                execute(fabfile.update_info)
            elif t['operation'] == 'install':
                package_string = ""
                packages = t['args']
                for p in packages:
                    package_string = package_string + p + " "
                execute(fabfile.install, package_string)
            elif t['operation'] == 'remove':
                package_string = ""
                packages = t['args']
                for p in packages:
                    package_string = package_string + p + " "
                execute(fabfile.remove, package_string)
            elif t['operation'] == 'remove_node':
                hosts.remove({'macaddress' : t['macaddress']})
            tasks.update({'_id' : t['_id']}, {'$set' : {'successful' : True}})