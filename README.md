== Web Video Streamer ==


what it does:

this program allows you to watch your home media from about everywhere, through even slow connections.

needs:

1. a webserver with php support
2. a current crtmpserver installation
3. a current libav-tools installation
5. a current libfaac installation
6. an outgoing connection thats strong enough to let you stream media (i guess at least 30kbyte/s out)

install procedure:

1. unpack the zip into your webroot or a subdir of your webroot
2. change the config.php settings to fit your needs, if needed (buffer and width/height depending on your bandwidth)
3. if youre behind a firewall, be sure you open port 8090 tcp (rtmpt) and port 1935 tcp (rtmp) 
to the outside world and forward them to the box running the rtmp server.
4. if you plan to use pseudo rtmp (no realtime encoding, dont click the start link before clicking the file...)
you will need to setup a second virtualhost directive on your server that links to your media directory on a port
of your choice, change the config.php according to your needs afterwards, if you want to use pseudo rtmp streaming
outside of your lan, be aware that it will need alot more bandwith than with real rtmp.
5. Make sure, that you have the right to run the exec(); command (usually you find out which commands you are
forbidden to use by looking in your php.ini for the line "disable_functions")

usage:

1. go to a directory with media files in it.
2. if you want to have the slow bandwidth version, click on start besides a media file (starts the encoding procedure).
3. click on the media file name (opens the popup with the playback).
4. to stop an encoding procedure of a media file, click on the stop besides the media file.

optimized to run under linux, playback tested with windows, linux. (want to assist me, please contact me)
uses flash player, pseudo rtmp playback (flowplayer_html5, projekktor) works with html5 in most cases,
so you should be fine on your iPad.

known bugs:

1. better video quality, thats always a place to tweak things...
2. known problems with directories containing ".", seen as files (open a bash terminal and just do a "rename 's/\./ /g' *"
make sure there are no single files in that directory, just directories...)
5. opera browser is not working correctly, working on that...
6. no audio file support done by now, this is something im gonna add in the future...

wishlist:

1. multiuser support, more than one person through rtmp, pseudo rtmp already has that... (DONE!)

useful commands:

rename 's/ avi/.avi/' *
rename 's/\[//g' *
rename 's/\]//g' *
rename 's/\(//g' *
rename 's/\)//g' *

always happy for any kind of input=)
