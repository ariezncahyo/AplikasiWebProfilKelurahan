vbwp36tn=xppr('wp36t_0.png');vbwp36to=xppr('wp36t_1.png');vbwp36tc=xppr('wp36t_2.png');vb4p36tn=xppr('4p36t_0.png');vb4p36to=xppr('4p36t_1.png');vb4p36tc=xppr('4p36t_2.png');vbzp36tn=xppr('zp36t_0.png');vbzp36to=xppr('zp36t_1.png');vbzp36tc=xppr('zp36t_2.png');vbup36tn=xppr('up36t_0.png');vbup36to=xppr('up36t_1.png');vbup36tc=xppr('up36t_2.png');vbvp36tn=xppr('vp36t_0.png');vbvp36to=xppr('vp36t_1.png');vbvp36tc=xppr('vp36t_2.png');vbyp36tn=xppr('yp36t_0.png');vbyp36to=xppr('yp36t_1.png');vbyp36tc=xppr('yp36t_2.png');vbxp36tn=xppr('xp36t_0.png');vbxp36to=xppr('xp36t_1.png');vbxp36tc=xppr('xp36t_2.png');vblp36tn=xppr('lp36t_0.png');vblp36to=xppr('lp36t_1.png');vblp36tc=xppr('lp36t_2.png');/*
 *==============================================================================
 *
 *     Copyright (c) 2007-2009, by Vista-buttons.com
 *     Version 2.1.2i
 *     http://vista-buttons.com
 *
 *==============================================================================
 * 
 * todo:
 * - item move into anchor
 * - item over using css
 * - item base on li structure
 *
 * variables:
 *   @btIdPref
 *   @pItem
 *   @ulIdPref
 *   @frameSubmenu
 *
 */
 
 
var btIdPref='vb';

function xppr(im) {
	var i=new Image();
	i.src=vbImgPath+'bt'+im;
	return i;
};

function xpe(id) {
	x=id.substring(0,id.length-1);
	if(document[btIdPref+x])document[btIdPref+x].src=eval(btIdPref+id+'.src');
};


/*
*	Vista buttons engine functions
*/ 
function vistaButtons(params){
	// init global vars
	var xobtn = null; // curent element text identifier curent
	var menuContId = 'xpMenuCont';
	var ulIdPref='vbUL_';
	
	
	//Detect browser
	var isDOM=document.getElementById; //DOM1 browser (MSIE 5+, Netscape 6, Opera 5+)
	var isOp=isO5=window.opera && isDOM; //Opera 5+
	var isOp7=isOp && document.readyState; //Opera 7+
	var isIE=document.all && document.all.item && !isOp; //Microsoft Internet Explorer 4+
	var isMz=isDOM && navigator.appName=="Netscape"; //Mozilla or Netscape 6.*


	
	/*
	 *  vistabuttons engine and global object
	 */
	
	/* create new menu and insert it to page */
	document.write('<div id="' + menuContId + '" ></div>');
	var menuCont = document.getElementById(menuContId);
		
	var ULs = document.getElementsByTagName('UL');
	for (var i=0, cnt=ULs.length; i<cnt; i++)
		if (ULs[i].id
		&& (ULs[i].id.substring(0, ulIdPref.length)==ulIdPref) // if is xp UL
		&& !(
			(ULs[i].parentNode)
			&& (ULs[i].parentNode.parentNode)
			&& (ULs[i].parentNode.parentNode.id.substring(0, ulIdPref.length)==ulIdPref)
			)
		)
		{
			// hide vista-buttons link
			var A=document.getElementById(ULs[i].id+'a');
			if (A) A.style.display='none';
		
			createMenu(ULs[i], 0, 0, params, menuCont);
			ULs[i].style.display = 'none';
		};
		
	

	/*
	 * create menu
	 * structure:	<div - menu >
	 *			<table>
	 *				<tr - item>
	 *					<td - for icon><img></td>
	 *					<td - for label><a></a></td>
	 *					<td - for arrow><img></td>
	 *				</tr>
		 *				...
	 *			</table>
	 *		</div>
	 * @ulParent - main parent of menu UL
	 * @iParent - parent item
	 * @level - level
	 */
	function createMenu(ulParent, iParent, level, params, owner){
	
		// create menu obj
		var oMenu = document.createElement((params.subFrame?'table':'div'));
		owner.appendChild(oMenu);
		if (oMenu.tagName == 'TABLE') oMenu.cellSpacing = 0; // set even if don't need in concert
		
		
		// assign menu content and crate a frame if need
		var oMenuCont;
		if (params.subFrame)
			for (var i=0; i<3; i++){
				var row = oMenu.insertRow(-1);
				for (var j=0; j<3; j++){
					var cell = row.insertCell(-1);
					if (i==1 && j==1) oMenuCont = cell
					else cell.className = 'imgFrame'+i+j;
				}
			}
		else
			oMenuCont = (oMenu.tagName == 'DIV')? oMenu: oMenu.insertRow(-1).insertCell(-1);
		
		oMenuCont.className = 'subContent';
		
		
		var oTable = document.createElement('table');
		oMenuCont.appendChild(oTable);

		oMenu.id = ulParent.id + 'tbl';
		oMenu.className = ulParent.className; // inherite style from menu definition with ul
		//oTable.style.visibility = 'hidden';
		oMenu.style.position = 'absolute'; // set here without fail
		oMenu.xpItems = [];		/* submenu items list */
		oMenu.iParent = iParent;
		oMenu.level = level;
		
		oMenu.style.zIndex = 9 + oMenu.level;
		oTable.cellSpacing = 0;

		// set menu events and metods
		oMenu.onmouseover = function (){
			xpStopTimeOut(this);
		};
		oMenu.onmouseout = function (){
			xpStartTimeOut(xpShownMenu)
		};
		oMenu.xpClearMenuMark = function(){
			for (var j = 0; j < this.xpItems.length; j++){
				p = this.xpItems[j];
				if (p.tagName == 'TR') {
					p.className = p.className.replace('over','');
					if (p.className.indexOf('popup')<0)	p.clrOverImg();
				}
			};
		};
		
		oMenu.smShown = 0;
		
		/* create items  - organizing circle for LI */
		for (var i=0, cntLI=ulParent.childNodes.length; i<cntLI; i++){
			var oLI = ulParent.childNodes[i];
			if (oLI.tagName != 'LI') continue;
			
			
			/* 
			*	create menu item
			*/
			
			// create item base
			var oItem = oTable.insertRow(-1);
			
					
			// parse LI content 
			// <img src="icon">     <a> Item Label </a>     <img src="arrow">     <ul></ul>
			var InnerAnchor = 0;
			oItem.Img = null;
			oItem.ImgOver = null;
			var InnerUl = 0;
			oItem.ImgArrow = null;
			oItem.ImgArrowOver = null;

			// parse LI content
			for (var j=0; j < oLI.childNodes.length; j++)
				if (oLI.childNodes[j].tagName == 'A') InnerAnchor = oLI.childNodes[j];
				else if (oLI.childNodes[j].tagName == 'IMG'){
					if (!InnerAnchor){
						if (!oItem.Img) oItem.Img = oLI.childNodes[j];
						else oItem.ImgOver = oLI.childNodes[j]
					}
					else {
						if(!oItem.ImgArrow) oItem.ImgArrow = oLI.childNodes[j];
						else oItem.ImgArrowOver = oLI.childNodes[j]
					}
				}
				else if (oLI.childNodes[j].tagName == 'UL') InnerUl = oLI.childNodes[j];
				else if (oLI.childNodes[j].tagName == 'DIV'){
					for (var k=0; k<oLI.childNodes[j].childNodes.length; k++)
						if (oLI.childNodes[j].childNodes[k].tagName=='UL') InnerUl = oLI.childNodes[j].childNodes[k];
				}


			if (InnerAnchor || InnerUl || oItem.ImgArrow){ // it is not a separator

				var oItemCont = oItem;
				oItem.className = oLI.className;
				oItem.menu = oMenu;		
				oItem.setPopup = function(){
					this.className +=  ' popup';
				};
				oItem.clrPopup = function(){
					this.className = this.className.replace('popup','');
					if (this.className.indexOf('over')<0) this.clrOverImg();
				};
				oItem.clrOverImg = function(){
					if (this.Img) this.Img.style.display = 'inline';
					if (this.ImgOver) this.ImgOver.style.display = 'none';
					if (this.ImgArrow) this.ImgArrow.style.display = 'inline';
					if (this.ImgArrowOver) this.ImgArrowOver.style.display = 'none'
				};
			
				// create item content
				var oTDIMG = oItemCont.insertCell(-1);
				var oTDLabel = oItemCont.insertCell(-1);
				var oTDArrow = oItemCont.insertCell(-1);
				
				oTDIMG.style.borderRightWidth = '0px';
				oTDLabel.style.borderRightWidth = '0px';
				oTDLabel.style.borderLeftWidth = '0px';
				oTDArrow.style.borderLeftWidth = '0px';
				oTDIMG.style.paddingRight = '4px';
				oTDLabel.style.paddingRight = '4px';
				oTDLabel.style.paddingLeft = '4px';
				oTDArrow.style.paddingLeft = '4px';

				if (oItem.Img) oTDIMG.appendChild(oItem.Img);
				else oTDIMG.innerHTML = '&nbsp;';
				if (oItem.ImgOver) {
					oItem.ImgOver.style.display = 'none';
					oTDIMG.appendChild(oItem.ImgOver);
				};

				// create anchor with link execution
				if (InnerAnchor){
					var newText = document.createElement('SPAN');
					newText.innerHTML = InnerAnchor.innerHTML;

					if (InnerAnchor.href.indexOf('.pdf')>=0 && document.all)
						oTDLabel.appendChild(newText)
					else{
						oTDLabel.appendChild(InnerAnchor);
						
						// off standart click 
						InnerAnchor.onclick = function(){
							return false;
						};
					};
					
					oItem.linkHref = InnerAnchor.href;
					oItem.linkTarget = InnerAnchor.target;
					
					/* add item to menu info */
					with(oMenu) xpItems[xpItems.length] = oItem;
					
					// define my click handle event
					oItem.onclick = function(){
						if (this.linkHref)
							open(this.linkHref, (this.linkTarget? this.linkTarget :"_self"));
					}
				}
				else oTDLabel.innerHTML = '&nbsp;';

				// set item events
				oItem.onmouseover = function (){
					// clear other mark
					this.menu.xpClearMenuMark();
					this.className += ' over';// mark this item
					if (this.ImgOver){
						this.Img.style.display = 'none';
						this.ImgOver.style.display = 'inline';
					};
					if (this.ImgArrowOver){
						this.ImgArrow.style.display = 'none';
						this.ImgArrowOver.style.display = 'inline';
					};

					if (this.smPopup) xpshowmenu(this.smPopup, 1, this); // show new menu
					else xpStartTimeOut(this.menu.smShown); // hide bug
				};
				oItem.onmouseout = function (){
					this.menu.xpClearMenuMark();
				};

				// define submenu
				if (InnerUl){
					// set event for over
					oTDArrow.className = 'arrow';
					if (oItem.ImgArrow){ 
						oTDArrow.appendChild(oItem.ImgArrow);
						if (oItem.ImgArrowOver){
							oItem.ImgArrowOver.style.display = 'none';
							oTDArrow.appendChild(oItem.ImgArrowOver)
						}
					}
					else {
						if (typeof(arrowChar)!='undefined' && arrowChar){
							oTDArrow.appendChild(document.createElement('a'));
							oTDArrow.lastChild.innerHTML = arrowChar;
						}
						else oTDArrow.innerHTML = '&nbsp;';
					};

					oItem.smPopup = createMenu(InnerUl, oItem, level + 1, params, owner);
				}
				else oTDArrow.innerHTML = '&nbsp;';
			}
			else{ // add a separator
				oItem.className = 'separator';
				var oTD = oItem.insertCell(-1);
				oTD.colSpan = 3;
				
				oTD.innerHTML = '<div></div>';
			}

		}

		return oMenu;
	};



	function xpDef(){
	  for(var i=0; i<arguments.length; ++i){if(typeof(arguments[i])=='undefined') return false;}
	  return true;
	};


	function xpClientSize(){
	
		var x=0,y=0,w=0,h=0,doc=document,win=window;

		var cond = (!doc.compatMode || doc.compatMode == 'CSS1Compat') /*&& !win.opera */&& doc.documentElement;
		// height
		if(cond && doc.documentElement.clientHeight) h=doc.documentElement.clientHeight;
		else if(doc.body && doc.body.clientHeight) h=doc.body.clientHeight;
		else if(xpDef(win.innerWidth,win.innerHeight,doc.width)) {
			h=win.innerHeight;
			if(doc.width>win.innerWidth) h-=16;
		};
		//width
		if(cond && doc.documentElement.clientWidth) w=doc.documentElement.clientWidth;
		else if(doc.body && doc.body.clientWidth) w=doc.body.clientWidth;
		else if(xDef(win.innerWidth,win.innerHeight,doc.height)) {
			w=win.innerWidth;
			if(doc.height>win.innerHeight) w-=16;
		}

		if(doc.documentElement && doc.documentElement.scrollLeft) x=doc.documentElement.scrollLeft;
		else if(doc.body && xpDef(doc.body.scrollLeft)) x=doc.body.scrollLeft;

		if(doc.documentElement && doc.documentElement.scrollTop) y=doc.documentElement.scrollTop;
		else if(doc.body && xpDef(doc.body.scrollTop)) y=doc.body.scrollTop;
		
		return {x:x,y:y,w:w,h:h};
	};



	function xpObjectSize(o){
		var w = (isOp&&!isOp7) ? o.style.pixelWidth  : document.layers ? o.clip.width /* Netscape 4.*/ : o.offsetWidth;
		var h = (isOp&&!isOp7) ? o.style.pixelHeight : document.layers ? o.clip.height/* Netscape 4.*/ : o.offsetHeight;
		return {x:w, y:h};
	};



	/*
	 * calc absolute coordinates of specified object
	 */
	function xppos(obj){
		var l=0, t=0;
		while (obj) //  && obj.tagName!='BODY'
		{
			l += obj.offsetLeft;
			t += obj.offsetTop;
		
			// some browser not right set offsetParent
			//		if (obj.style && obj.style.position=='absolute') break;// this is a fix but not constant
			
			obj = obj.offsetParent;
		};	

		// fix special for opera
		if (document.body) with (document){
			if (body.leftMargin) l -= body.leftMargin;
			if (body.topMargin) t -= body.topMargin
		}

		return {x: l, y: t};
	};



	/* show menu item
	 * ind - part of object identifier
	 * @isVertical - previous menu is vertical
	 * @iParent - object created events identifier - this is about a anchor or previous menu item
	 */
	var xpshow = window.xpshow = function(ind, isVertical, iParent){
		xpshowmenu(ulIdPref+ind+'tbl', isVertical, iParent);
	}

	function xpshowmenu(menu, isVertical, iParent)
	{
		menu = get(menu);
		if (!menu) return;
		
		// already showing?
		if (menu.style.visibility == 'visible'){
			xpStopTimeOut(menu);
			return;
		};
		
		// hide previous menu in this level
		if (iParent && iParent.menu)
			xphide(iParent.menu.smShown);
		if (!menu.level && (xpShownMenu != menu))
			xphide(xpShownMenu);

		// it saves button main menu
		if (!menu.level) xobtn = menu.id.replace(ulIdPref,'').replace('tbl','');

		// Parent - parent menu item
		var parentObj =  (iParent.tagName == 'A')? iParent.parentNode: iParent;

		var pos = xppos(parentObj); // parent coordinate
		if (iParent && iParent.menu){
			pos.x -= iParent.menu['scrollLeft'] || 0;
			pos.y -= iParent.menu['scrollTop'] || 0;
		};
		var size = xpObjectSize(parentObj);

		menu.xpMenuX = 1; // menu open direction
		menu.xpMenuDx = 1; // menu open  offset
		if (menu.level > 0){
			// inherit direction from previous level
			menu.xpMenuX = menu.iParent.menu.xpMenuX;
			menu.xpMenuDx = menu.iParent.menu.xpMenuDx;
		};
		
		// initialize property
		menu.style.overflow = 'visible';
		menu.style.height = 'auto';
		menu.style.width = 'auto';

		// fix bug position for some document structure
		menu.style.left = '0px';
		menu.style.top = '0px';
		var parentAbs = xppos(menu);

		// detect window size
		var WinSize = xpClientSize();
		var menuSize = xpObjectSize(menu);

		// calc and init Y coordinate
		var CalcedPos = xpCalcMenuPos(WinSize.y, WinSize.h, pos.y, size.y, menuSize.y, menu.xpMenuDx, isVertical);

		menu.xpMenuDx = CalcedPos.align;

		// fix scrollbar bug for opera
		if (isOp && !menu.OrigWidth) menu.OrigWidth = menu.clientWidth;//menu.clientWidth;


		// size was changed - resize height, open scroll, correct width for scrollbar
		if (CalcedPos.size < menuSize.y){
			//xpsm.style.overflowY = 'auto';
			menu.style.overflow = 'auto';
			//menu.style.overflow = 'visible';
			if (isIE) menu.style.overflowX = 'visible';
			if (isIE) menu.style.width = menu.offsetWidth + 17 + 'px';
			else if (isMz) menu.style.magrinRight = 20;

			menu.style.height = CalcedPos.size + 'px';
			menu.scrollTop  = 0;
			menu.scrollLeft = 0;

			// fix scrollbar bug for opera
			if (isOp) menu.style.width = menu.OrigWidth + 'px';
		};

		menu.style.top = CalcedPos.xy - parentAbs.y + 'px';

		// calc and init X coorinate
		menuSize = xpObjectSize(menu);
		CalcedPos = xpCalcMenuPos(WinSize.x, WinSize.w, pos.x, size.x, menuSize.x, menu.xpMenuX, !isVertical);
		menu.xpMenuX = CalcedPos.align;
		if (CalcedPos.size < menuSize.x)// size was changed
			if (menu.xpMenuX > 0)
				CalcedPos.xy -= (menuSize.x - CalcedPos.size); // covered
		menu.style.left = CalcedPos.xy - parentAbs.x + 'px';

		menu.style.visibility = 'visible';

		if (!menu.level) xpShownMenu = menu
		else {
			iParent.menu.smShown = menu;
			iParent.setPopup();
		}
		
	};

	
	

	/*
	 calc menu pos for one coordinate 
	 use size of menu, parent object and screen, menu direction and parent menu orientation
	 screenSize - size of screen
	 parentXY, parentSize - position and size of parent menu
	 size - size of selected menu
	 align = +1(right, bottom), 0(center), -1(left, top)  - direction of menu
	 oHoriz  = 0(vertical), 1(horizontal) - orientation of parent menu
	*/
	function xpCalcMenuPos(screenXY, screenSize, parentXY, parentSize, size, align, oHoriz){
		var xy = parentXY;
		var newSize = size;
		var newAlign = align;
		var space = 5; // space to document borders
		
		if ((align == 0) && (!oHoriz)) align = 1; //center may be only for horizontal orientation
		
		if (!oHoriz) {// VERTICAL
			// |------<--------->)<---parent--->(<---------->---------|
			// check the place for the future menu and correct orientation
			if	(((newAlign >= 0) && (parentXY + parentSize + size > screenSize + screenXY - space)) // don't go in screen from the algin
								|| ((newAlign < 0) && (parentXY - size < space))){
				// correct direction about most of place
				if (parentXY - screenXY > screenSize + screenXY - (parentXY + parentSize)) newAlign = -1; else newAlign = 1;
			};
			// set coordinate and size
			if (newAlign >= 0){
				xy = parentXY + parentSize;
				if (screenSize + screenXY - space - xy < newSize) newSize = screenSize + screenXY  - space - xy;
			}
			else {
				xy = parentXY - newSize;
				if (xy - screenXY < space){
					xy = space + screenXY;
					newSize = parentXY - space - screenXY;
				}
			}
		}
		else {
			// --------------- <---parent---> -------------------
			//                      (<------------------------>--------|
			//   |-----<--------------------->)
			// if menu not go in screen
			if (newSize > screenSize - 2*space) {
				xy = space + screenXY;
				newSize = screenSize - 2*space;
			}
			else{
				// calc
				xy = parentXY + parentSize/2 - newSize/2 + newAlign * (newSize/2 - parentSize/2);

				// correct
				if (xy < space + screenXY){
					newAlign = 1;
					xy = space + screenXY;
				}
				if (xy + size > screenSize  + screenXY - space){
					newAlign = -1;
					xy -= xy + newSize - (screenSize  + screenXY - space);
				}
			}
		};

		return {xy: xy, size: newSize, align: newAlign};
	};
	
	
	function get(o){
		return (typeof o == 'string')? document.getElementById(o): o
	}
	

	/*
	 * hide submenu
	 * @menu
	 */
	function xphide(menu){
		menu = get(menu);
		if (!menu || menu.style.visibility != 'visible') return;

		// hide child
		xphide(menu.smShown);
		
		// off cursor selection
		menu.xpClearMenuMark();

		// hide the menu
		menu.style.visibility = 'hidden';

		// if all submenu close, then change button icon
		if (menu.level == 0){
			xpe(xobtn + 'n');//???????????
		}

		menu.smShown = 0;
		if (menu.iParent) menu.iParent.clrPopup();

		// clear to hide timeout
		if (menu.hideTimer){
			clearTimeout(menu.hideTimer);
			menu.hideTimer = null;
		}
	};
	window.xphide = xphide;
	
	

	// on mouse out from menu
	window.xpsmout = function(sender){
		if (!sender) return;
		// set time out
		xpStartTimeOut(xpShownMenu)
	};
	

	// on mouse over menu
	window.xpsmover = function(menu)
	{
		xpStopTimeOut(menu);
	};


	/*
	*	clear Time out for all parent and this menu 
	*	run in submenu engine context
	*/
	function xpStopTimeOut(menu){
		for( var o = menu; o; o = o.iParent? o.iParent.menu: 0)
			if (o.hideTimer)
				o.hideTimer = clearTimeout(o.hideTimer);
	};

	
	/*
	 * 	 start hide timer for this menu and all its submenu 
	 */
	function xpStartTimeOut(menu){
		if (menu) {
			if (!menu.hideTimer) 
				menu.hideTimer = setTimeout( function (){ xphide(menu) } , 300);
			xpStartTimeOut(menu.smShown)
		}
	}


};// end of menu component

var xpShownMenu = 0; // curent open menu tread

new vistaButtons({
	subFrame: 0
});


