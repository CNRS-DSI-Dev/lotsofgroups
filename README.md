# LotsOfGroups

Owncloud 7 app + theme that  ease managing great number of groups.

If you have lots of groups to manage, the "user page" may be difficult to use. This app replaces the long list of groups by an unique autocompleted text input.

## Installation

### App

As usual, you put the app in your [owncloud]/apps/ directory, then go to the app's admin page and active it.

### Theme

This app provides a theme part that is needed to override the default owncloud theme.

See http://doc.owncloud.org/server/7.0/developer_manual/core/theming.html to create your own theme.

You will need to copy, merge (or use symbolic links) this app's theme part with your own theme if exists, or insert it in a new created theme.

The final directory tree must be as the one below :

```
[owncloud]
├── themes
│   └── [my-theme]
│       └── settings
│           ├── js
│           │   └── users
│           │       └── groups.js            <-- this is provided by lotsofgroups app
│           └── templates
│               ├── settings.php
│               └── users
│                   ├── main.php
│                   ├── part.createuser.php
│                   ├── part.grouplist.php   <-- this is provided by lotsofgroups app
│                   ├── part.setquota.php
│                   └── part.userlist.php
```

The settings.php, main.php, part.createuser.php, part.setquota.php and part.userlist.php in your theme must be copied or "symbolic linked" from core ownCloud core (find them in [owncloud]/settings/templates directory).

## License and authors

|                      |                                          |
|:---------------------|:-----------------------------------------|
| **Author:**          | Patrick Paysant (<ppaysant@linagora.com>)
| **Copyright:**       | Copyright (c) 2014 CNRS DSI
| **License:**         | AGPL v3, see the COPYING file.