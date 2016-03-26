function speed(){var e;e=document.getElementsByName("speed")[0].value;return e}function target(){var e;var t;var n;e=document.getElementsByName("galaxy")[0].value;t=document.getElementsByName("system")[0].value;n=document.getElementsByName("planet")[0].value;return"["+e+":"+t+":"+n+"]"}function setACS(e){document.getElementsByName("fleet_group")[0].value=e;return}function setACS_target(e){document.getElementsByName("acs_target_mr")[0].value=e;return}function setTarget(e,t,n,r){document.getElementsByName("galaxy")[0].value=e;document.getElementsByName("system")[0].value=t;document.getElementsByName("planet")[0].value=n;document.getElementsByName("planettype")[0].value=r}function setMission(e){document.getElementsByName("order")[0].selectedIndex=e;return}function setUnion(e){document.getElementsByName("union2")[0].selectedIndex=e}function setTargetLong(e,t,n,r,i,s){setTarget(e,t,n,r);setMission(i);setUnions(s)}function min(e,t){e=e*1;t=t*1;if(e>t){return t}else{return e}}function maxspeed(){var e=1e9;for(i=200;i<220;i++){if(document.getElementsByName("ship"+i)[0]){if(document.getElementsByName("speed"+i)[0].value*1>=1&&document.getElementsByName("ship"+i)[0].value*1>=1){e=min(e,document.getElementsByName("speed"+i)[0].value)}}}return e}function distance(){var e;var t;var n;var r;var i;var s;var o;e=document.getElementsByName("thisgalaxy")[0].value;t=document.getElementsByName("thissystem")[0].value;n=document.getElementsByName("thisplanet")[0].value;r=document.getElementsByName("galaxy")[0].value;i=document.getElementsByName("system")[0].value;s=document.getElementsByName("planet")[0].value;o=0;if(r-e!=0){o=Math.abs(r-e)*2e4}else if(i-t!=0){o=Math.abs(i-t)*5*19+2700}else if(s-n!=0){o=Math.abs(s-n)*5+1e3}else{o=5}return o}function duration(){var e;e=document.getElementsByName("speedfactor")[0].value;msp=maxspeed();sp=speed();dist=distance();ret=Math.round((35e3/sp*Math.sqrt(dist*10/msp)+10)/e);return ret}function consumption2(){var e;var t=0;for(i=200;i<220;i++){if(document.getElementsByName("ship"+i)[0]){t=t+document.getElementsByName("consumption"+i)[0].value*document.getElementsByName("ship"+i)[0].value}}speedfactor=document.getElementsByName("speedfactor")[0].value;msp=maxspeed();sp=speed();dist=distance();e=Math.round(t*dist/35e3*(sp/10+1)*(sp/10+1))+1;return e}function consumption(){var e=0;var t=0;var n;var r;msp=maxspeed();sp=speed();dist=distance();dur=duration();speedfactor=document.getElementsByName("speedfactor")[0].value;for(r=200;r<220;r++){if(document.getElementsByName("ship"+r)[0]){shipspeed=document.getElementsByName("speed"+r)[0].value;spd=35e3/(dur*speedfactor-10)*Math.sqrt(dist*10/shipspeed);t=document.getElementsByName("consumption"+r)[0].value*document.getElementsByName("ship"+r)[0].value;e+=t*dist/35e3*(spd/10+1)*(spd/10+1)}}e=Math.round(e)+1;return e}function probeConsumption(){var e=0;var t=0;var n;var r;msp=maxspeed();sp=speed();dist=distance();dur=duration();speedfactor=document.getElementsByName("speedfactor")[0].value;if(document.getElementsByName("ship210")[0]){shipspeed=document.getElementsByName("speed210")[0].value;spd=35e3/(dur*speedfactor-10)*Math.sqrt(dist*10/shipspeed);t=document.getElementsByName("consumption210")[0].value*document.getElementsByName("ship210")[0].value;e+=t*dist/35e3*(spd/10+1)*(spd/10+1)}e=Math.round(e)+1;return e}function unusedProbeStorage(){var e=document.getElementsByName("capacity210")[0].value*document.getElementsByName("ship210")[0].value;var t=e-probeConsumption();return t>0?t:0}function storage(){var e=0;for(i=200;i<300;i++){if(document.getElementsByName("ship"+i)[0]){if(document.getElementsByName("ship"+i)[0].value*1>=1){e+=document.getElementsByName("ship"+i)[0].value*document.getElementsByName("capacity"+i)[0].value}}}e=e*getStorageFaktor();e-=consumption();if(document.getElementsByName("ship210")[0]){e-=unusedProbeStorage()}return e}function fleetInfo(){document.getElementById("speed").innerHTML=speed()*10+"%";document.getElementById("target").innerHTML=target();document.getElementById("distance").innerHTML=distance();var e=duration();var t=Math.floor(e/3600);e-=t*3600;var n=Math.floor(e/60);e-=n*60;if(n<10)n="0"+n;if(e<10)e="0"+e;document.getElementById("duration").innerHTML=t+":"+n+":"+e+" h";var r=storage();var i=consumption();document.getElementById("maxspeed").innerHTML=tsdpkt(maxspeed());if(r>=0){document.getElementById("consumption").innerHTML='<font color="lime">'+i+"</font>";document.getElementById("storage").innerHTML='<font color="lime">'+r+"</font>"}else{document.getElementById("consumption").innerHTML='<font color="red">'+i+"</font>";document.getElementById("storage").innerHTML='<font color="red">'+r+"</font>"}calculateTransportCapacity()}function shortInfo(){document.getElementById("distance").innerHTML=tsdpkt(distance());var e=duration();var t=Math.floor(e/3600);e-=t*3600;var n=Math.floor(e/60);e-=n*60;if(n<10)n="0"+n;if(e<10)e="0"+e;document.getElementById("duration").innerHTML=t+":"+n+":"+e+" h";var r=storage();var i=consumption();document.getElementById("maxspeed").innerHTML=tsdpkt(maxspeed());if(r>=0){document.getElementById("consumption").innerHTML='<font color="lime">'+tsdpkt(i)+"</font>";document.getElementById("storage").innerHTML='<font color="lime">'+tsdpkt(r)+"</font>"}else{document.getElementById("consumption").innerHTML='<font color="red">'+tsdpkt(i)+"</font>";document.getElementById("storage").innerHTML='<font color="red">'+tsdpkt(r)+"</font>"}}function setResource(e,t){if(document.getElementsByName(e)[0]){document.getElementsByName("resource"+e)[0].value=t}}function maxResource(e){var t=parseInt(document.getElementsByName("thisresource"+e)[0].value);var n=parseInt(document.getElementsByName("resource"+e)[0].value);if(isNaN(n)){n=0}if(isNaN(t)){t=0}var r=storage();if(e==3){if(t-consumption()<0)t=0;else t-=consumption()}var i=document.getElementsByName("resource1")[0].value;var s=document.getElementsByName("resource2")[0].value;var o=document.getElementsByName("resource3")[0].value;if(isNaN(i)){i=0}if(isNaN(s)){s=0}if(isNaN(o)){o=0}var u=Math.max(r-i-s-o,0);var a=Math.min(u+n,t);if(document.getElementsByName("resource"+e)[0]){document.getElementsByName("resource"+e)[0].value=a}calculateTransportCapacity()}function maxResources(){var e;var t=storage();var n=Math.round(document.getElementsByName("thisresource1")[0].value);var r=Math.round(document.getElementsByName("thisresource2")[0].value);var i=Math.round(document.getElementsByName("thisresource3")[0].value-consumption());var s=t-n-r-i;if(s<0){n=Math.min(n,t);r=Math.min(r,t-n);i=Math.min(i,t-n-r)}document.getElementsByName("resource1")[0].value=Math.max(n,0);document.getElementsByName("resource2")[0].value=Math.max(r,0);document.getElementsByName("resource3")[0].value=Math.max(i,0);calculateTransportCapacity()}function maxShip(e){if(document.getElementsByName(e)[0]){document.getElementsByName(e)[0].value=document.getElementsByName("max"+e)[0].value}}function maxShips(){var e;for(i=200;i<225;i++){e="ship"+i;maxShip(e)}}function noShip(e){if(document.getElementsByName(e)[0]){document.getElementsByName(e)[0].value=0}}function noShips(){var e;for(i=200;i<225;i++){e="ship"+i;noShip(e)}}function calculateTransportCapacity(){var e=Math.round(Math.abs(document.getElementsByName("resource1")[0].value));var t=Math.round(Math.abs(document.getElementsByName("resource2")[0].value));var n=Math.round(Math.abs(document.getElementsByName("resource3")[0].value));transportCapacity=storage()-e-t-n;if(transportCapacity<0){document.getElementById("remainingresources").innerHTML="<font color=red>"+transportCapacity+"</font>"}else{document.getElementById("remainingresources").innerHTML="<font color=lime>"+transportCapacity+"</font>"}return transportCapacity}function getLayerRef(e,t){if(!t)t=window.document;if(t.layers){for(var n=0;n<t.layers.length;n++)if(t.layers[n].id==e)return t.layers[n];for(var n=0;n<t.layers.length;n++){var r=getLayerRef(e,t.layers[n].document);if(r)return r}return null}else if(t.all){return t.all[e]}else if(t.getElementById){return t.getElementById(e)}}function setVisibility(e,t){if(document.layers){e.visibility=t==true?"show":"hide"}else{e.style.visibility=t==true?"visible":"hidden"}}function setVisibilityForDivByPrefix(e,t,n){if(!n)n=window.document;if(document.layers){for(var r=0;r<n.layers.length;r++){if(n.layers[r].id.substr(0,e.length)==e)setVisibility(n.layers[l],t);setVisibilityForDivByPrefix(e,t,n.layers[r].document)}}else if(document.all){var i=document.all.tags("div");for(r=0;r<i.length;r++){if(i[r].id.substr(0,e.length)==e)setVisibility(document.all.tags("div")[r].visible)}}else if(document.getElementsByTagName){var i=document.getElementsByTagName("div");for(r=0;r<i.length;r++){if(i[r].id.substr(0,e.length)==e)setVisibility(i[r].visible)}}}function setPlanet(e){var t=e.split(":");document.getElementsByName("galaxy")[0].value=t[0];document.getElementsByName("system")[0].value=t[1];document.getElementsByName("planet")[0].value=t[2];document.getElementsByName("planettype")[0].value=t[3];setMission(t[4])}function setUnions(e){galaxy=document.getElementsByName("galaxy")[0].value;system=document.getElementsByName("system")[0].value;planet=document.getElementsByName("planet")[0].value;planettype=document.getElementsByName("planettype")[0].value;thisgalaxy=document.getElementsByName("thisgalaxy")[0].value;thissystem=document.getElementsByName("thissystem")[0].value;thisplanet=document.getElementsByName("thisplanet")[0].value;thisplanettype=document.getElementsByName("thisplanettype")[0].value;spd=document.getElementsByName("speed")[0].value;speedfactor=document.getElementsByName("speedfactor")[0].value;for(i=0;i<e;i++){var t=document.getElementById("union"+i).innerHTML;time=document.getElementsByName("union"+i+"time")[0].value;targetgalaxy=document.getElementsByName("union"+i+"galaxy")[0].value;targetsystem=document.getElementsByName("union"+i+"system")[0].value;targetplanet=document.getElementsByName("union"+i+"planet")[0].value;targetplanettype=document.getElementsByName("union"+i+"planettype")[0].value;if(targetgalaxy==galaxy&&targetsystem==system&&targetplanet==planet&&targetplanettype==planettype){inSpeedLimit=isInSpeedLimit(flightTime(thisgalaxy,thissystem,thisplanet,targetgalaxy,targetsystem,targetplanet,spd,speedfactor),time);if(inSpeedLimit==2){document.getElementById("union"+i).innerHTML='<font color="lime">'+t+"</font>"}else if(inSpeedLimit==1){document.getElementById("union"+i).innerHTML='<font color="orange">'+t+"</font>"}else{document.getElementById("union"+i).innerHTML='<font color="red">'+t+"</font>"}}else{document.getElementById("union"+i).innerHTML='<font color="#00a0ff">'+t+"</font>"}}}function isInSpeedLimit(e,t){var n=new Date;n=Math.round(n/1e3);if(e<(t-n)*(1+.5)){return 2}else if(e<(t-n)*1){return 1}else{return 0}}function flightTime(e,t,n,r,i,s,o,u,a){if(e-r!=0){dist=Math.abs(e-r)*2e4}else if(t-i!=0){dist=Math.abs(t-i)*5*19+2700}else if(n-s!=0){dist=Math.abs(n-s)*5+1e3}else{dist=5}return Math.round((35e3/o*Math.sqrt(dist*10/u)+10)/a)}function showCoords(){document.getElementsByName("speed")[0].disabled=false;document.getElementsByName("galaxy")[0].disabled=false;document.getElementsByName("system")[0].disabled=false;document.getElementsByName("planet")[0].disabled=false;document.getElementsByName("planettype")[0].disabled=false;document.getElementsByName("shortlinks")[0].disabled=false}function hideCoords(){document.getElementsByName("speed")[0].disabled=true;document.getElementsByName("galaxy")[0].disabled=true;document.getElementsByName("system")[0].disabled=true;document.getElementsByName("planet")[0].disabled=true;document.getElementsByName("planettype")[0].disabled=true;document.getElementsByName("shortlinks")[0].disabled=true}function showOrders(){document.getElementsByName("order")[0].disabled=false;return}function hideOrders(){document.getElementsByName("order")[0].disabled=true}function showResources(){document.getElementsByName("resource1")[0].disabled=false;document.getElementsByName("resource2")[0].disabled=false;document.getElementsByName("resource3")[0].disabled=false;document.getElementsByName("holdingtime")[0].disabled=false}function hideResources(){document.getElementsByName("resource1")[0].disabled=true;document.getElementsByName("resource2")[0].disabled=true;document.getElementsByName("resource3")[0].disabled=true;document.getElementsByName("holdingtime")[0].disabled=true}function setShips(e,t,n,r,i,s,o,u,a,f,l,c,h,p,d,v,m){setNumber("202",e);setNumber("203",t);setNumber("204",n);setNumber("205",r);setNumber("206",i);setNumber("207",s);setNumber("208",o);setNumber("209",u);setNumber("210",a);setNumber("211",f);setNumber("213",l);setNumber("214",c);setNumber("215",h)}function setNumber(e,t){if(typeof document.getElementsByName("ship"+e)[0]!="undefined"){document.getElementsByName("ship"+e)[0].value=t}}function tsdpkt(e){r="";vz="";if(e<0){vz="-"}e=abs(e);r=e%1e3;while(e>=1e3){k1="";if(e%1e3<100){k1="0"}if(e%1e3<10){k1="00"}if(e%1e3==0){k1="00"}e=abs((e-e%1e3)/1e3);r=e%1e3+"."+k1+r}r=vz+r;return r}function abs(e){if(e<0)return-e;return e}