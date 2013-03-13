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

    # do the tasks in the task queue
    tasks = db.tasks
    task_list = tasks.find()

    for t in task_list:
        env.hosts = t['host_list']
        if t['operation'] == 'shutdown':
            execute(fabfile.shutdown)
        elif t['operation'] == 'reboot':
            execute(fabfile.reboot)
        elif t['operation'] == 'upgrade':
            execute(fabfile.upgrade)
        elif t['operation'] == 'update':
            execute(fabfile.update)
        tasks.remove(t['_id'])