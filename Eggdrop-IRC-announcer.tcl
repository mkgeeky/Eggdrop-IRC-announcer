#############################
# This script is made by: mkgeeky
# Web: https://mkgeeky.xyz
# Git: https://github.com/mkgeeky/
# Mail: contact@mkgeeky.xyz
# Lines above MAY NOT BE removed!
#############################
# Change config
set conf(port) 35789
set conf(chan) "#"
set conf(pass) "bWFtYWFyZW1lcmU"
# Stop editing
listen $conf(port) script idle:listen

proc idle:listen {idx} {
    control $idx idle:process
}

proc idle:process {idx args} {
	global conf

	set args [join $args]
    set password [lindex [split $args] 0]
    set message [join [lrange [split $args] 1 end]]

    if {[string match $password $conf(pass)]} {
        putquick "PRIVMSG $conf(chan) : $message"
    }
}

putlog "Eggdrop IRC announcer by mkgeeky"
