//v.3.6 build 130417

/*
Copyright DHTMLX LTD. http://www.dhtmlx.com
To use this component please contact sales@dhtmlx.com to obtain license
*/
var swfobject=function(){function y(){if(!w){try{var a=d.getElementsByTagName("body")[0].appendChild(p("span"));a.parentNode.removeChild(a)}catch(b){return}w=!0;for(var c=B.length,f=0;f<c;f++)B[f]()}}function P(a){w?a():B[B.length]=a}function Q(a){if(typeof q.addEventListener!=j)q.addEventListener("load",a,!1);else if(typeof d.addEventListener!=j)d.addEventListener("load",a,!1);else if(typeof q.attachEvent!=j)$(q,"onload",a);else if(typeof q.onload=="function"){var b=q.onload;q.onload=function(){b();
a()}}else q.onload=a}function aa(){R?ba():H()}function ba(){var a=d.getElementsByTagName("body")[0],b=p(t);b.setAttribute("type",C);var c=a.appendChild(b);if(c){var f=0;(function(){if(typeof c.GetVariable!=j){var g=c.GetVariable("$version");if(g)g=g.split(" ")[1].split(","),e.pv=[parseInt(g[0],10),parseInt(g[1],10),parseInt(g[2],10)]}else if(f<10){f++;setTimeout(arguments.callee,10);return}a.removeChild(b);c=null;H()})()}else H()}function H(){var a=s.length;if(a>0)for(var b=0;b<a;b++){var c=s[b].id,
f=s[b].callbackFn,g={success:!1,id:c};if(e.pv[0]>0){var d=m(c);if(d)if(D(s[b].swfVersion)&&!(e.wk&&e.wk<312)){if(x(c,!0),f)g.success=!0,g.ref=I(c),f(g)}else if(s[b].expressInstall&&J()){var h={};h.data=s[b].expressInstall;h.width=d.getAttribute("width")||"0";h.height=d.getAttribute("height")||"0";if(d.getAttribute("class"))h.styleclass=d.getAttribute("class");if(d.getAttribute("align"))h.align=d.getAttribute("align");for(var k={},i=d.getElementsByTagName("param"),n=i.length,l=0;l<n;l++)i[l].getAttribute("name").toLowerCase()!=
"movie"&&(k[i[l].getAttribute("name")]=i[l].getAttribute("value"));K(h,k,c,f)}else ca(d),f&&f(g)}else if(x(c,!0),f){var u=I(c);if(u&&typeof u.SetVariable!=j)g.success=!0,g.ref=u;f(g)}}}function I(a){var b=null,c=m(a);if(c&&c.nodeName=="OBJECT")if(typeof c.SetVariable!=j)b=c;else{var f=c.getElementsByTagName(t)[0];f&&(b=f)}return b}function J(){return!E&&D("6.0.65")&&(e.win||e.mac)&&!(e.wk&&e.wk<312)}function K(a,b,c,f){E=!0;L=f||null;S={success:!1,id:c};var g=m(c);if(g){g.nodeName=="OBJECT"?(A=M(g),
F=null):(A=g,F=c);a.id=T;if(typeof a.width==j||!/%$/.test(a.width)&&parseInt(a.width,10)<310)a.width="310";if(typeof a.height==j||!/%$/.test(a.height)&&parseInt(a.height,10)<137)a.height="137";d.title=d.title.slice(0,47)+" - Flash Player Installation";var o=e.ie&&e.win?"ActiveX":"PlugIn",h="MMredirectURL="+encodeURI(window.location).toString().replace(/&/g,"%26")+"&MMplayerType="+o+"&MMdoctitle="+d.title;typeof b.flashvars!=j?b.flashvars+="&"+h:b.flashvars=h;if(e.ie&&e.win&&g.readyState!=4){var k=
p("div");c+="SWFObjectNew";k.setAttribute("id",c);g.parentNode.insertBefore(k,g);g.style.display="none";(function(){g.readyState==4?g.parentNode.removeChild(g):setTimeout(arguments.callee,10)})()}N(a,b,c)}}function ca(a){if(e.ie&&e.win&&a.readyState!=4){var b=p("div");a.parentNode.insertBefore(b,a);b.parentNode.replaceChild(M(a),b);a.style.display="none";(function(){a.readyState==4?a.parentNode.removeChild(a):setTimeout(arguments.callee,10)})()}else a.parentNode.replaceChild(M(a),a)}function M(a){var b=
p("div");if(e.win&&e.ie)b.innerHTML=a.innerHTML;else{var c=a.getElementsByTagName(t)[0];if(c){var f=c.childNodes;if(f)for(var g=f.length,d=0;d<g;d++)!(f[d].nodeType==1&&f[d].nodeName=="PARAM")&&f[d].nodeType!=8&&b.appendChild(f[d].cloneNode(!0))}}return b}function N(a,b,c){var f,d=m(c);if(e.wk&&e.wk<312)return f;if(d){if(typeof a.id==j)a.id=c;if(e.ie&&e.win){var o="",h;for(h in a)if(a[h]!=Object.prototype[h])h.toLowerCase()=="data"?b.movie=a[h]:h.toLowerCase()=="styleclass"?o+=' class="'+a[h]+'"':
h.toLowerCase()!="classid"&&(o+=" "+h+'="'+a[h]+'"');var k="",i;for(i in b)b[i]!=Object.prototype[i]&&(k+='<param name="'+i+'" value="'+b[i]+'" />');d.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+o+">"+k+"</object>";G[G.length]=a.id;f=m(a.id)}else{var n=p(t);n.setAttribute("type",C);for(var l in a)a[l]!=Object.prototype[l]&&(l.toLowerCase()=="styleclass"?n.setAttribute("class",a[l]):l.toLowerCase()!="classid"&&n.setAttribute(l,a[l]));for(var u in b)b[u]!=Object.prototype[u]&&
u.toLowerCase()!="movie"&&da(n,u,b[u]);d.parentNode.replaceChild(n,d);f=n}}return f}function da(a,b,c){var f=p("param");f.setAttribute("name",b);f.setAttribute("value",c);a.appendChild(f)}function U(a){var b=m(a);if(b&&b.nodeName=="OBJECT")e.ie&&e.win?(b.style.display="none",function(){b.readyState==4?ea(a):setTimeout(arguments.callee,10)}()):b.parentNode.removeChild(b)}function ea(a){var b=m(a);if(b){for(var c in b)typeof b[c]=="function"&&(b[c]=null);b.parentNode.removeChild(b)}}function m(a){var b=
null;try{b=d.getElementById(a)}catch(c){}return b}function p(a){return d.createElement(a)}function $(a,b,c){a.attachEvent(b,c);z[z.length]=[a,b,c]}function D(a){var b=e.pv,c=a.split(".");c[0]=parseInt(c[0],10);c[1]=parseInt(c[1],10)||0;c[2]=parseInt(c[2],10)||0;return b[0]>c[0]||b[0]==c[0]&&b[1]>c[1]||b[0]==c[0]&&b[1]==c[1]&&b[2]>=c[2]?!0:!1}function V(a,b,c,f){if(!e.ie||!e.mac){var g=d.getElementsByTagName("head")[0];if(g){var o=c&&typeof c=="string"?c:"screen";f&&(O=r=null);if(!r||O!=o){var h=p("style");
h.setAttribute("type","text/css");h.setAttribute("media",o);r=g.appendChild(h);e.ie&&e.win&&typeof d.styleSheets!=j&&d.styleSheets.length>0&&(r=d.styleSheets[d.styleSheets.length-1]);O=o}e.ie&&e.win?r&&typeof r.addRule==t&&r.addRule(a,b):r&&typeof d.createTextNode!=j&&r.appendChild(d.createTextNode(a+" {"+b+"}"))}}}function x(a,b){if(W){var c=b?"visible":"hidden";w&&m(a)?m(a).style.visibility=c:V("#"+a,"visibility:"+c)}}function X(a){var b=/[\\\"<>\.;]/,c=b.exec(a)!=null;return c&&typeof encodeURIComponent!=
j?encodeURIComponent(a):a}var j="undefined",t="object",Y="Shockwave Flash",fa="ShockwaveFlash.ShockwaveFlash",C="application/x-shockwave-flash",T="SWFObjectExprInst",Z="onreadystatechange",q=window,d=document,v=navigator,R=!1,B=[aa],s=[],G=[],z=[],A,F,L,S,w=!1,E=!1,r,O,W=!0,e=function(){var a=typeof d.getElementById!=j&&typeof d.getElementsByTagName!=j&&typeof d.createElement!=j,b=v.userAgent.toLowerCase(),c=v.platform.toLowerCase(),f=c?/win/.test(c):/win/.test(b),e=c?/mac/.test(c):/mac/.test(b),
o=/webkit/.test(b)?parseFloat(b.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):!1,h=!+"\u000b1",k=[0,0,0],i=null;if(typeof v.plugins!=j&&typeof v.plugins[Y]==t){if((i=v.plugins[Y].description)&&!(typeof v.mimeTypes!=j&&v.mimeTypes[C]&&!v.mimeTypes[C].enabledPlugin))R=!0,h=!1,i=i.replace(/^.*\s+(\S+\s+\S+$)/,"$1"),k[0]=parseInt(i.replace(/^(.*)\..*$/,"$1"),10),k[1]=parseInt(i.replace(/^.*\.(.*)\s.*$/,"$1"),10),k[2]=/[a-zA-Z]/.test(i)?parseInt(i.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0}else if(typeof q.ActiveXObject!=
j)try{var n=new ActiveXObject(fa);if(n&&(i=n.GetVariable("$version")))h=!0,i=i.split(" ")[1].split(","),k=[parseInt(i[0],10),parseInt(i[1],10),parseInt(i[2],10)]}catch(l){}return{w3:a,pv:k,wk:o,ie:h,win:f,mac:e}}(),ga=function(){e.w3&&((typeof d.readyState!=j&&d.readyState=="complete"||typeof d.readyState==j&&(d.getElementsByTagName("body")[0]||d.body))&&y(),w||(typeof d.addEventListener!=j&&d.addEventListener("DOMContentLoaded",y,!1),e.ie&&e.win&&(d.attachEvent(Z,function(){d.readyState=="complete"&&
(d.detachEvent(Z,arguments.callee),y())}),q==top&&function(){if(!w){try{d.documentElement.doScroll("left")}catch(a){setTimeout(arguments.callee,0);return}y()}}()),e.wk&&function(){w||(/loaded|complete/.test(d.readyState)?y():setTimeout(arguments.callee,0))}(),Q(y)))}(),ha=function(){e.ie&&e.win&&window.attachEvent("onunload",function(){for(var a=z.length,b=0;b<a;b++)z[b][0].detachEvent(z[b][1],z[b][2]);for(var c=G.length,f=0;f<c;f++)U(G[f]);for(var d in e)e[d]=null;e=null;for(var j in swfobject)swfobject[j]=
null;swfobject=null})}();return{registerObject:function(a,b,c,f){if(e.w3&&a&&b){var d={};d.id=a;d.swfVersion=b;d.expressInstall=c;d.callbackFn=f;s[s.length]=d;x(a,!1)}else f&&f({success:!1,id:a})},getObjectById:function(a){if(e.w3)return I(a)},embedSWF:function(a,b,c,d,g,o,h,k,i,n){var l={success:!1,id:b};e.w3&&!(e.wk&&e.wk<312)&&a&&b&&c&&d&&g?(x(b,!1),P(function(){c+="";d+="";var e={};if(i&&typeof i===t)for(var q in i)e[q]=i[q];e.data=a;e.width=c;e.height=d;var m={};if(k&&typeof k===t)for(var r in k)m[r]=
k[r];if(h&&typeof h===t)for(var p in h)typeof m.flashvars!=j?m.flashvars+="&"+p+"="+h[p]:m.flashvars=p+"="+h[p];if(D(g)){var s=N(e,m,b);e.id==b&&x(b,!0);l.success=!0;l.ref=s}else if(o&&J()){e.data=o;K(e,m,b,n);return}else x(b,!0);n&&n(l)})):n&&n(l)},switchOffAutoHideShow:function(){W=!1},ua:e,getFlashPlayerVersion:function(){return{major:e.pv[0],minor:e.pv[1],release:e.pv[2]}},hasFlashPlayerVersion:D,createSWF:function(a,b,c){if(e.w3)return N(a,b,c)},showExpressInstall:function(a,b,c,d){e.w3&&J()&&
K(a,b,c,d)},removeSWF:function(a){e.w3&&U(a)},createCSS:function(a,b,c,d){e.w3&&V(a,b,c,d)},addDomLoadEvent:P,addLoadEvent:Q,getQueryParamValue:function(a){var b=d.location.search||d.location.hash;if(b){/\?/.test(b)&&(b=b.split("?")[1]);if(a==null)return X(b);for(var c=b.split("&"),e=0;e<c.length;e++)if(c[e].substring(0,c[e].indexOf("="))==a)return X(c[e].substring(c[e].indexOf("=")+1))}return""},expressInstallCallback:function(){if(E){var a=m(T);if(a&&A){a.parentNode.replaceChild(A,a);if(F&&(x(F,
!0),e.ie&&e.win))A.style.display="block";L&&L(S)}E=!1}}}}();

//v.3.6 build 130417

/*
Copyright DHTMLX LTD. http://www.dhtmlx.com
To use this component please contact sales@dhtmlx.com to obtain license
*/