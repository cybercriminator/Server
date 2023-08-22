#!/usr/bin/perl -w
use strict;
use IO::Socket;

sub Wait {
	wait; # wait needed to keep <defunct> pids from building up
}

$SIG{CHLD} = \&Wait;

my $server = IO::Socket::INET->new(
	LocalPort 	=> 2014, # istediyiniz port reqemini buraya yazin
	Type 		=> SOCK_STREAM,
	Reuse 		=> 1,
	Listen 		=> 10) or die "$@\n";
my $client ;

while($client = $server->accept()) {
	select $client;
	print $client "HTTP/1.0 200 OK\r\n";
	print $client "Content-type: text/html\r\n\r\n";
	print $client '<title>Hacked By Ramil Feyziyev - CyBeR CRiMiNaToR</title><center><h1>Hacked By Ramil Feyziyev - CyBeR CRiMiNaToR</h1></center>
'; # html kodunu buraya yazin amma dirnaqlar diqqet edin indexde burdada
}
continue {
	close($client); #kills hangs
	kill CHLD => -$$;
}
