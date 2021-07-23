# wordpress-plugin-demo
A simple WordPress plugin demo - listens for landing pages url parameter and redirects accordingly.

# What's it for?
A simple proof-of-concept of how easy it is to create a WordPress plugin

# What it does?
It listens for special parameters in URL to redirect to different landing pages.

# How does it work?
Using php global $_GET, we fetch the lp= value.
If lp=1, redirect to my site.
If lp=2, redirect to contoso.com (and then to microsoft.com)
If lp is blank or anything else, do nothing.

# Customizations
Change lp to "utm_" parameters to drop in place with existing marketing campaigns.

# TO DO
Right now things are just hard-coded; we should add an Admin panel space where you can add the values there.
Change this to actually use utm_ parameters by default
