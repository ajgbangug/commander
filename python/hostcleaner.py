#!/usr/bin/env python

import fabfile
import pymongo
import config

from fabric.tasks import execute
from fabric.api import *

if __name__ == '__main__':
    env.user = config.USER_SSH
    env.password = config.PASS_SSH
    connection = pymongo.Connection(config.DBSERVER, config.PORT)
    db = connection[config.DATABASE]
    db.authenticate(config.DBUSER, config.DBPASS)

    hosts = db.hosts
    host_list = hosts.find()

    status = {'online' : False}
    for h in host_list:
        if not fabfile.is_host_up(h['ipaddress']):
            hosts.update({'_id': h['_id']}, {'$set' : status})