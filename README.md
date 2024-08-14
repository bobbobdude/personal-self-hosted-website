# Making and hosting my own website



## My website: https://tomdevprofile.zapto.org/



## Installing Raspberry Pi OS

This is the first step in many a Raspberry Pi project, and is a very similar process to installing any OS. I used the tool linked here [https://www.raspberrypi.com/software/](https://www.raspberrypi.com/software/). The only note I really have about this stage was that due to the nature of Apache and serving static content (HTML files, images, etc.) it causes a lot of read operations. Although better than frequent writes, this is still something that can contribute to instability. 

Logging is perhaps a more pertinent issue, as these frequent writes will degrade the SD card faster. As some big writes are less wearing than lots of little writes, I could have used a tool to store the logs in RAM and then set up some kind of cron job to flush the logs to the SD card periodically.

Of course running an OS and web server on an SD card will never be optimal no matter what software garnish we use. A real solution would be a shield for the RPi that would have allowed me to use an M.2 SSD for everything. 

## Configuring Apache2

This was a simple case of updating the package list as usual, and then installing Apache2.  
The first step after this was ensuring we could make changes to `/var/www/html` without root access, this involved the following commands: 

`sudo usermod \-a \-G www-data pi`

As I am not particularly familiar with these commands I will break them down in detail \- mostly for my own understanding. Of course `sudo` stands for “superuser do” and allows you to execute commands with root privileges. 

`usermod` changes the abilities a certain user has on a computer. 

The -`a` tag appends the user to the groups listed after the `-G` as opposed to removing them from all other groups not listed. 

The `-G` tag and following string determines the group to add the user to. The string here is a group used by Apache to give a user the necessary access permissions to make changes to the web server stuff. 

And `pi` is the default user account.

`sudo chown -R \-f www-data:www-data /var/www/html`  

This next command forcefully (suppressing error messages) changes the ownership of the folder stored at `/var/www/html` \- using recursion to change every file stored within that folder to be owned by the group `www-data`. 

### Apache Virtual Host

These are the mechanisms by which Apache handles each individual site. Let me work through an example so I can explain it to myself better (this would be stored as a .conf file in the `/etc/apache2/sites-available/` folder): 

`<VirtualHost *:80>`

  `ServerAdmin webmaster@example.com`

  `ServerName example.com`

  `ServerAlias www.example.com`

  `DocumentRoot /var/www/example.com/public_html`

  `ErrorLog ${APACHE_LOG_DIR}/example.com_error.log`

  `CustomLog ${APACHE_LOG_DIR}/example.com_access.log combined`

`</VirtualHost>`

We first specify the IP address and port on which the virtual host will respond \- the asterisk means it will listen to all IP addresses on port 80, which is the default port for web servers using HTTP (443 being for https \- the protocol my website uses). 

`Server name` is the domain being used.

`DocumentRoot` determines where Apache will take the files from to deliver the website.

The rest uses environment variables in order to correctly specify the location of the logging files. 

We then enable the site by modifying the sites-enabled directory through the following command: 

`sudo a2ensite example.com.conf`

So now you can have multiple sites on the same server\! WHOOHOO\!

## Configuring No-IP with automatic updates

Now as I am hosting this in my apartment I do not have a static IP address, which is not great if I want people to visit my website. The way I explained this to myself was through the metaphor of a burger van. 

Due to the nature of dynamic IP addresses, the route to my website will change. This is the equivalent of having a burger van, and moving said burger van without informing any customers. 

So what I need is some sort of middleman to tell my customers the new location of my burger van, maybe a sign that stays in the same place that gives the current location. This is where No-IP ([https://www.noip.com/](https://www.noip.com/)) steps in by providing me with the sign. This sign (hostname) automatically updates and redirects people to the new location and will never change and burgers will be eaten/websites visited.  

I do not promise burgers if you visit my website. 

No-IP provides a Dynamic Update Client (DUC) to keep my current IP address in sync with the domain as well, which I set up on the Raspberry Pi. 

## Configuring (and eventually removing) watchdog

Watchdog effectively sets parameters that check if the Pi is still chugging along fine. The ones I fiddled around with were max-temperature, ping and of course interval. This ended up causing more instability oddly enough (I am sure it was my fault) so I ended up removing Watchdog and since then (touch wood) my server has been up 24/7 without fault. 

## Configuring Uptime

This was a cool little addition just to track whether the domain is accessible or not, sending me an email if it is not. You can see the public status page here \- [https://stats.uptimerobot.com/aSQkvqlmlG](https://stats.uptimerobot.com/aSQkvqlmlG). 

## Configuring UFP

The GitHub for this is here \- [https://github.com/ivuk/ufp](https://github.com/ivuk/ufp)  
This was a step that I was a little intimidated by, but this was incredibly easy to use. I did have a problem where I accidentally blocked the port required for RealVNC but this was easily rectified by allowing traffic through the port required, here are some examples of the commands: 

`sudo ufw allow http  
sudo ufw allow https`

## Changing port forwarding settings in router

The final step was configuring my router to reroute incoming traffic that requested my domain to the Pi, where it could send back my website. This is dependent upon your router but for me it was relatively easy to set up DDNS and log in to No-IP domain provider. 

## Automating site updates after pushing to the repository

After a lot of trouble, I finally got the RPi to automatically pull down new pushes to the repo here almost instantaneously using GitHub webhooks and PHP code that is automatically triggered every time a push is detected. It is secured via SSH and a secret to ensure only I can trigger this process. Now the website should always be in tandem with this repo. 

## Automatic backups to Google Drive 

Using [Rclone](https://rclone.org/), a simple SH script and creating a cron job my server automatically backs up all the configuration files to my Google Drive every day at 2AM.

## Setting up fail2ban 

I set up [fail2ban](https://github.com/fail2ban/fail2ban) to block: 
1. Brute force SSH attacks
2. Repeated failed login attempts to areas requiring auth (none at the moment - but who knows in the future!)
3. Bad bots such as scrapers 
4. Attempts to access my home directories 
5. Attempts to access non-existent pages/directory traversal 

## Final notes

And that's it\! In the end this project took me about 8 + 3 + 2 + 1 hours to research and complete, and I am incredibly happy with the result. As you can see I installed and used Git on my RPi to update the website. It is so cool to me to have a corner of the internet I can physically locate on a map that is mine. I really enjoyed this project, and hope to continue learning HTML and update the server accordingly. 