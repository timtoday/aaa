eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('2B([\'Q\',\'17\'],c(Q,17){3 14={};14.2D=c(){7(1l(b.p)!==\'1c\'){3 9=$(".5-9[8-u=\'"+b.p.f+"\']");7(9.o<=\'0\'){3 1s=$(".5-9");7(1s.o>\'0\'){3 6=17(\'1F\',{5:b.p});$(1s).1s().2G(6)}D{b.p.I=1;3 6=17(\'1F\',{5:b.p});$(\'.1A-21\').1J();$(\'.j-1A\').6(6)}}D{3 5=b.p;9.t(\'.q\').6(5.q);9.t(\'.l\').6(5.l);9.t(\'.5\').6(5.k.22(/ /25,\'\')+\' \'+5.5)}16 b.p}$(\'*[8-2a=16]\').2S(\'R\').R(c(){3 9=$(h).1b(\'.5-9\');3 f=9.8(\'u\');7(!f){f=$(h).8("u");3 i=f}y.2E(\'删除后无法恢复, 确认要删除吗 ?\',c(){Q.F(\'1j/5/16\',{f:f},c(z){7(z.1x==1){7(z.g.20){$("[8-u=\'"+z.g.20+"\']").t(\':1d\').2s(\'1m\',A)}9.1Z();2K(c(){7($(".5-9").o<=0){$(\'.1A-21\').s()}},2F);B}y.C.s(z.g.1B)},A,A);7(f==i){b.1y.1z()}})});$(1g).1P(\'R\',\'[8-2a=27]\',c(){3 9=$(h).1b(\'.5-9\');3 f=9.8(\'u\');7(!f){f=$(h).8("u")}Q.F(\'1j/5/27\',{f:f},c(z){7(z.1x==1){$(\'.j-1A\').2c(9);y.C.s("设置默认地址成功");B}y.C.s(z.g.1B)},A,A)})};14.2z=c(N){3 1L=[\'1S.2k\'];7(N.1e){1L=[\'1S.2k\',\'1S.2J\']}2I(1L,c(){$(\'#k\').1G({1o:\'请选择所在城市\',1e:N.1e,1k:N.1k,2P:c(2x){3 12=$(\'#k\').P(\'8-K\');3 10=12.2l(\' \');7(N.1e&&N.1k){3 w=10[1];3 J=10[2];w=w+\'\';J=J+\'\';3 8=1T(w,J);3 d=$(\'<1Q 2n="1M" f="d"  W="d" 8-K="" K="" 2w="所在街道"  r="j-1Q" 2C=""/>\');3 2g=$(\'#d\').1b(\'.j-2T-2Q\');$(\'#d\').1Z();2g.2y(d);d.1G({1o:\'请选择所在街道\',d:1,8:8})}}});7(N.1e&&N.1k){3 12=$(\'#k\').P(\'8-K\');7(12){3 10=12.2l(\' \');3 w=10[1];3 J=10[2];3 8=1T(w,J);$(\'#d\').1G({1o:\'请选择所在街道\',d:1,8:8})}}});$(1g).1P(\'R\',\'#1q-5\',c(){2O.2L({2H:c(E){$("#q").n(E.2M);$(\'#l\').n(E.2N);$(\'#5\').n(E.2R);$(\'#k\').n(E.T+" "+E.V+" "+E.28);3 T=E.T,V=E.V,1r=E.28;3 1O=0,w=0,1i=0;3 29=\'../2m/2o/2h/2j/2i/1H/2A.2r?v=4\';1I=1E(29);7(b.1D){S=1I.3k("5").1C}D{S=1I.1C[0].Z("19")}7(S.o>0){13(3 11=0;11<S.o;11++){19=S[11];7(19.G("W")==T&&T!=Y&&T.1K().o>0){1O=19.G("1h");1w=S[11].Z("1X");13(3 X=0;X<1w.o;X++){7(1w[X].G("W")==V&&V!=Y&&V.1K().o>0){w=1w[X].G("1h");H=S[11].Z("1X")[X].Z("H");13(3 18=0;18<H.o;18++){7(H[18].G("W")==1r&&1r!=Y&&1r.1K().o>0){1i=H[18].G("1h")}}}}}}}$("#k").P("8-K",1O+" "+w+" "+1i)}})});$(1g).1P(\'R\',\'#1q-O\',c(){7($(h).P(\'O\')){B}7($(\'#q\').1u()){y.C.s("请填写收件人");B}3 2d=/(境外地区)+/.1t($(\'#k\').n());3 26=/(台湾)+/.1t($(\'#k\').n());3 2f=/(澳门)+/.1t($(\'#k\').n());3 23=/(香港)+/.1t($(\'#k\').n());7(2d||26||2f||23){7($(\'#l\').1u()){y.C.s("请填写手机号码");B}}D{7(!$(\'#l\').3l()){y.C.s("请填写正确手机号码");B}}7($(\'#k\').1u()){y.C.s("请填写所在地区");B}7($(\'#5\').1u()){y.C.s("请填写详细地址");B}$(\'#1q-O\').6(\'正在处理...\').P(\'O\',1);b.p={q:$(\'#q\').n(),l:$(\'#l\').n(),5:$(\'#5\').n(),k:$(\'#k\').n(),d:$(\'#d\').n(),3m:$(\'#d\').P(\'8-K\'),12:$(\'#k\').P(\'8-K\'),I:$(\'#I\').3j(\':1m\')?1:0};Q.F(\'1j/5/O\',{f:$(\'#u\').n(),3i:b.p},c(F){$(\'#1q-O\').6(\'保存地址\').3f(\'O\');b.p.f=F.g.u;7(F.1x==1){y.C.s(\'保存成功!\');1y.1z()}D{y.C.s(F.g.1B)}},A,A)})};14.3g=c(){7(1l(b.p)!==\'1c\'){3 5=b.p;3 9=$(".5-9[8-u=\'"+5.f+"\']",$(\'#1a-5-U\'));7(9.o>0){9.t(\'.q\').6(5.q);9.t(\'.l\').6(5.l);9.t(\'.5\').6(5.k.22(/ /25,\'\')+\' \'+5.5)}D{3 6=17(\'1F\',{5:b.p});$(\'.j-e-3o\').2c(6)}16 b.p}3 15=1U;7(1l(b.1f)!==\'1c\'){15=b.1f.f;16 b.1f}D 7(1l(b.2t)!==\'1c\'){15=b.2t}7(15){$(".5-9[8-u=\'"+15+"\'] .j-1d",$(\'#1a-5-U\')).2s(\'1m\',A)}$(\'.5-9 .j-e-1W,.5-9 .j-e-1V\',$(\'#1a-5-U\')).R(c(){3 $h=$(h).1b(\'.5-9\');b.1f={\'q\':$h.t(\'.q\').6(),\'5\':$h.t(\'.5\').6(),\'l\':$h.t(\'.l\').6(),\'f\':$h.8(\'u\')};1y.1z()});$(\'#3n\',$(\'#1a-5-U\')).3p(c(){Q.F(\'1j/5/3t\',{3u:$(h).n()},c(z){7(z.1x==1){3 g=z.g;$(\'#2b\').1J();$(\'#1R\').s();3 6="";13(3 i=0;i<g.e.o;i++){3 I=g.e[i].I;6+=\'<x  r="j-e 5-9"  8-I="\'+I+\'"  8-u="\'+g.e[i].f+\'">\';6+=\'<x r="j-e-1W">\';6+=\'<1Q 2n="1d" W="3s" r="j-1d  j-1d-3r" \';7(2u(I)>0){6+=\' 1m \'}6+=\' /></x>\';6+=\'<x r="j-e-1V">\';6+=\'<x r="1o"><L r="q">\'+g.e[i].q+\'</L> <L r="l">\'+g.e[i].l+\'</L></x>\';6+=\'<x r="1M">\';6+=\'<L r="5">\';7(2u(I)>0){6+=\' <L r="2U">默认</L> \'}3 d=" ";7(g.e[i].d!=1c){d+=g.e[i].d+\' \'}6+=g.e[i].19+g.e[i].1X+g.e[i].1H+d+g.e[i].5;6+=\'</L>\';6+=\'</x>\';6+=\'</x>\';6+=\'<a  3q="\'+g.e[i].3h+\'" r="3d" 8-30="A">\';6+=\'<x r="j-e-3e">\';6+=\'<i r="2e 2e-31"></i>\';6+=\'</x>\';6+=\'</a>\';6+=\'</x>\'}$(\'#1R\').6(6);$(\'.5-9 .j-e-1W,.5-9 .j-e-1V\',$(\'#1a-5-U\')).R(c(){3 $h=$(h).1b(\'.5-9\');b.1f={\'q\':$h.t(\'.q\').6(),\'5\':$h.t(\'.5\').6(),\'l\':$h.t(\'.l\').6(),\'f\':$h.8(\'u\')};1y.1z()})}D{$(\'#2b\').s();$(\'#1R\').1J()}},A,A)})};14.32=c(){Q.F(\'1j/5/U/2Z\',{},c(){})};b.1E=c(1v){3 M=Y;7(b.1D){M=2p 1D("2Y.2V");M.2W=1U;M.2X(1v)||M.33(1v)}D 7(1g.2v&&1g.2v.34){3 1p=2p b.3a();1p.3b("3c",1v,1U);1p.39(Y);M=1p.38}D{M=Y}B M};b.1T=c(w,J){3 2q=w.35(0,2);3 24=\'../2m/2o/2h/2j/2i/1H/e/\'+2q+\'/\'+w+\'.2r\';3 1Y=1E(24);3 1n=1Y.1C[0].Z("H");3 8=[];7(1n.o>0){13(3 i=0;i<1n.o;i++){3 H=1n[i];3 1i=H.G("1h");7(1i==J){3 1N=H.Z("d");13(3 m=0;m<1N.o;m++){3 d=1N[m];8.36({"1M":d.G(\'W\'),"K":d.G(\'1h\'),"37":[]})}}}}B 8};B 14});',62,217,'|||var||address|html|if|data|item||window|function|street|list|id|result|this||fui|areas|mobile||val|length|editAddressData|realname|class|show|find|addressid||city_code|div|FoxUI|ret|true|return|toast|else|res|json|getAttribute|county|isdefault|area_code|value|span|xmlDom|params|submit|attr|core|click|TopnodeList|provinceName|selector|cityName|name|citys_index|null|getElementsByTagName|codes|province_index|datavalue|for|modal|selectedAddressID|delete|tpl|county_index|province|page|closest|undefined|radio|new_area|selectedAddressData|document|code|county_code|member|address_street|typeof|checked|CityList|title|xmlhttp|btn|countyName|first|test|isEmpty|xmlFile|citys|status|history|back|content|message|childNodes|ActiveXObject|loadXmlFile|tpl_address_item|cityPicker|area|xmlDoc|hide|trim|reqParams|text|streetlist|province_code|on|input|addresslist|foxui|loadStreetData|false|inner|media|city|xmlCityDoc|remove|defaultid|empty|replace|xianggang|xmlUrl|ig|taiwan|setdefault|countryName|xmlfile|toggle|noaddress|prepend|jingwai|icon|aomen|parents|static|dist|js|picker|split|addons|type|ewei_shopv2|new|left|xml|prop|orderSelectedAddressID|parseInt|implementation|placeholder|self|append|initPost|AreaNew|define|readonly|initList|confirm|100|before|success|require|citydatanew|setTimeout|openAddress|userName|telNumber|wx|onClose|info|detailInfo|unbind|cell|tacitlyapprove|XMLDOM|async|load|Microsoft|get_list|nocache|icon_huida_tianxiebtn|loadSelectorData|loadXML|createDocument|substring|push|children|responseXML|send|XMLHttpRequest|open|GET|external|angle|removeAttr|initSelector|editurl|addressdata|is|selectSingleNode|isMobile|streetdatavalue|search|group|change|href|danger|selected|getselector|keywords'.split('|'),0,{}))