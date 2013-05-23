# DO NOT EDIT
# This makefile makes sure all linkable targets are
# up-to-date with anything they link to
default:
	echo "Do not invoke directly"

# For each target create a dummy rule so the target does not have to exist
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a:
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a:
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a:
/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a:


# Rules to remove targets that are older than anything to which they
# link.  This forces Xcode to relink the targets from scratch.  It
# does not seem to check these dependencies itself.
PostBuild.pmjni.Debug:
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libpmjni.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/Debug/pmjni.build/Objects-normal/i386/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/Debug/pmjni.build/Objects-normal/ppc/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/Debug/pmjni.build/Objects-normal/x86_64/libpmjni.dylib


PostBuild.portmidi-static.Debug:
PostBuild.latency.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/latency
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/latency:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/latency.build/Objects-normal/i386/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/latency.build/Objects-normal/ppc/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/latency.build/Objects-normal/x86_64/latency


PostBuild.midiclock.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/midiclock
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/midiclock:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midiclock.build/Objects-normal/i386/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midiclock.build/Objects-normal/ppc/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midiclock.build/Objects-normal/x86_64/midiclock


PostBuild.midithread.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/midithread
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/midithread:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midithread.build/Objects-normal/i386/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midithread.build/Objects-normal/ppc/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midithread.build/Objects-normal/x86_64/midithread


PostBuild.midithru.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/midithru
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/midithru:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midithru.build/Objects-normal/i386/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midithru.build/Objects-normal/ppc/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/midithru.build/Objects-normal/x86_64/midithru


PostBuild.mm.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/mm
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/mm:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/mm.build/Objects-normal/i386/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/mm.build/Objects-normal/ppc/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/mm.build/Objects-normal/x86_64/mm


PostBuild.qtest.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/qtest
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/qtest:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/qtest.build/Objects-normal/i386/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/qtest.build/Objects-normal/ppc/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/qtest.build/Objects-normal/x86_64/qtest


PostBuild.sysex.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/sysex
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/sysex:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/sysex.build/Objects-normal/i386/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/sysex.build/Objects-normal/ppc/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/sysex.build/Objects-normal/x86_64/sysex


PostBuild.test.Debug:
PostBuild.portmidi-static.Debug: /Applications/MAMP/htdocs/www/labs/midi/test/Debug/test
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/test:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/test.build/Objects-normal/i386/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/test.build/Objects-normal/ppc/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Debug/test.build/Objects-normal/x86_64/test


PostBuild.portmidi-dynamic.Debug:
/Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Debug/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/Debug/portmidi-dynamic.build/Objects-normal/i386/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/Debug/portmidi-dynamic.build/Objects-normal/ppc/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/Debug/portmidi-dynamic.build/Objects-normal/x86_64/libportmidi.dylib


PostBuild.pmjni.Release:
/Applications/MAMP/htdocs/www/labs/midi/test/Release/libpmjni.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/Release/pmjni.build/Objects-normal/i386/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/Release/pmjni.build/Objects-normal/ppc/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/Release/pmjni.build/Objects-normal/x86_64/libpmjni.dylib


PostBuild.portmidi-static.Release:
PostBuild.latency.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/latency
/Applications/MAMP/htdocs/www/labs/midi/test/Release/latency:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/latency.build/Objects-normal/i386/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/latency.build/Objects-normal/ppc/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/latency.build/Objects-normal/x86_64/latency


PostBuild.midiclock.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/midiclock
/Applications/MAMP/htdocs/www/labs/midi/test/Release/midiclock:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midiclock.build/Objects-normal/i386/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midiclock.build/Objects-normal/ppc/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midiclock.build/Objects-normal/x86_64/midiclock


PostBuild.midithread.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/midithread
/Applications/MAMP/htdocs/www/labs/midi/test/Release/midithread:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midithread.build/Objects-normal/i386/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midithread.build/Objects-normal/ppc/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midithread.build/Objects-normal/x86_64/midithread


PostBuild.midithru.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/midithru
/Applications/MAMP/htdocs/www/labs/midi/test/Release/midithru:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midithru.build/Objects-normal/i386/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midithru.build/Objects-normal/ppc/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/midithru.build/Objects-normal/x86_64/midithru


PostBuild.mm.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/mm
/Applications/MAMP/htdocs/www/labs/midi/test/Release/mm:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/mm.build/Objects-normal/i386/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/mm.build/Objects-normal/ppc/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/mm.build/Objects-normal/x86_64/mm


PostBuild.qtest.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/qtest
/Applications/MAMP/htdocs/www/labs/midi/test/Release/qtest:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/qtest.build/Objects-normal/i386/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/qtest.build/Objects-normal/ppc/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/qtest.build/Objects-normal/x86_64/qtest


PostBuild.sysex.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/sysex
/Applications/MAMP/htdocs/www/labs/midi/test/Release/sysex:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/sysex.build/Objects-normal/i386/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/sysex.build/Objects-normal/ppc/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/sysex.build/Objects-normal/x86_64/sysex


PostBuild.test.Release:
PostBuild.portmidi-static.Release: /Applications/MAMP/htdocs/www/labs/midi/test/Release/test
/Applications/MAMP/htdocs/www/labs/midi/test/Release/test:\
	/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/test.build/Objects-normal/i386/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/test.build/Objects-normal/ppc/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/Release/test.build/Objects-normal/x86_64/test


PostBuild.portmidi-dynamic.Release:
/Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/Release/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/Release/portmidi-dynamic.build/Objects-normal/i386/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/Release/portmidi-dynamic.build/Objects-normal/ppc/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/Release/portmidi-dynamic.build/Objects-normal/x86_64/libportmidi.dylib


PostBuild.pmjni.MinSizeRel:
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libpmjni.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/MinSizeRel/pmjni.build/Objects-normal/i386/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/MinSizeRel/pmjni.build/Objects-normal/ppc/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/MinSizeRel/pmjni.build/Objects-normal/x86_64/libpmjni.dylib


PostBuild.portmidi-static.MinSizeRel:
PostBuild.latency.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/latency
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/latency:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/latency.build/Objects-normal/i386/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/latency.build/Objects-normal/ppc/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/latency.build/Objects-normal/x86_64/latency


PostBuild.midiclock.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midiclock
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midiclock:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midiclock.build/Objects-normal/i386/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midiclock.build/Objects-normal/ppc/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midiclock.build/Objects-normal/x86_64/midiclock


PostBuild.midithread.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midithread
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midithread:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midithread.build/Objects-normal/i386/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midithread.build/Objects-normal/ppc/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midithread.build/Objects-normal/x86_64/midithread


PostBuild.midithru.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midithru
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midithru:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midithru.build/Objects-normal/i386/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midithru.build/Objects-normal/ppc/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/midithru.build/Objects-normal/x86_64/midithru


PostBuild.mm.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/mm
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/mm:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/mm.build/Objects-normal/i386/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/mm.build/Objects-normal/ppc/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/mm.build/Objects-normal/x86_64/mm


PostBuild.qtest.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/qtest
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/qtest:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/qtest.build/Objects-normal/i386/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/qtest.build/Objects-normal/ppc/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/qtest.build/Objects-normal/x86_64/qtest


PostBuild.sysex.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/sysex
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/sysex:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/sysex.build/Objects-normal/i386/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/sysex.build/Objects-normal/ppc/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/sysex.build/Objects-normal/x86_64/sysex


PostBuild.test.MinSizeRel:
PostBuild.portmidi-static.MinSizeRel: /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/test
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/test:\
	/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/test.build/Objects-normal/i386/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/test.build/Objects-normal/ppc/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/MinSizeRel/test.build/Objects-normal/x86_64/test


PostBuild.portmidi-dynamic.MinSizeRel:
/Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/MinSizeRel/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/MinSizeRel/portmidi-dynamic.build/Objects-normal/i386/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/MinSizeRel/portmidi-dynamic.build/Objects-normal/ppc/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/MinSizeRel/portmidi-dynamic.build/Objects-normal/x86_64/libportmidi.dylib


PostBuild.pmjni.RelWithDebInfo:
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libpmjni.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/RelWithDebInfo/pmjni.build/Objects-normal/i386/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/RelWithDebInfo/pmjni.build/Objects-normal/ppc/libpmjni.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_common/portmidi.build/RelWithDebInfo/pmjni.build/Objects-normal/x86_64/libpmjni.dylib


PostBuild.portmidi-static.RelWithDebInfo:
PostBuild.latency.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/latency
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/latency:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/latency.build/Objects-normal/i386/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/latency.build/Objects-normal/ppc/latency
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/latency.build/Objects-normal/x86_64/latency


PostBuild.midiclock.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midiclock
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midiclock:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midiclock.build/Objects-normal/i386/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midiclock.build/Objects-normal/ppc/midiclock
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midiclock.build/Objects-normal/x86_64/midiclock


PostBuild.midithread.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midithread
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midithread:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midithread.build/Objects-normal/i386/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midithread.build/Objects-normal/ppc/midithread
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midithread.build/Objects-normal/x86_64/midithread


PostBuild.midithru.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midithru
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midithru:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midithru.build/Objects-normal/i386/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midithru.build/Objects-normal/ppc/midithru
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/midithru.build/Objects-normal/x86_64/midithru


PostBuild.mm.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/mm
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/mm:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/mm.build/Objects-normal/i386/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/mm.build/Objects-normal/ppc/mm
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/mm.build/Objects-normal/x86_64/mm


PostBuild.qtest.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/qtest
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/qtest:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/qtest.build/Objects-normal/i386/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/qtest.build/Objects-normal/ppc/qtest
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/qtest.build/Objects-normal/x86_64/qtest


PostBuild.sysex.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/sysex
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/sysex:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/sysex.build/Objects-normal/i386/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/sysex.build/Objects-normal/ppc/sysex
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/sysex.build/Objects-normal/x86_64/sysex


PostBuild.test.RelWithDebInfo:
PostBuild.portmidi-static.RelWithDebInfo: /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/test
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/test:\
	/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi_s.a
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/test.build/Objects-normal/i386/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/test.build/Objects-normal/ppc/test
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_test/portmidi.build/RelWithDebInfo/test.build/Objects-normal/x86_64/test


PostBuild.portmidi-dynamic.RelWithDebInfo:
/Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi.dylib:
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/RelWithDebInfo/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/RelWithDebInfo/portmidi-dynamic.build/Objects-normal/i386/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/RelWithDebInfo/portmidi-dynamic.build/Objects-normal/ppc/libportmidi.dylib
	/bin/rm -f /Applications/MAMP/htdocs/www/labs/midi/test/pm_dylib/portmidi.build/RelWithDebInfo/portmidi-dynamic.build/Objects-normal/x86_64/libportmidi.dylib


