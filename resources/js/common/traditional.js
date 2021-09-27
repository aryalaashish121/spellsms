export default class Traditional {
    constructor() {
        let me = this;
        me.NepFont = "splsplबsplदsplअsplमsplभsplाsplनsplजsplष्splवsplपsplिsplऽsplsplलsplयsplउsplत्रsplचsplकsplतsplगsplखsplधsplहsplथsplशsplब्splद्यsplऋsplम्splभ्splँsplन्splज्splक्ष्splव्splप्splीsplःsplल्splइsplएsplत्तsplच्splक्splत्splग्splख्splध्splह्splथ्splश्spl१spl२spl३spl४spl५spl६spl७spl८spl९spl०spl।splस्spl,splसsplढsplडsplज्ञsplद्दsplरुsplुsplण्splेsplृsplैsplर्splञsplञ्splघsplद्धsplछsplटsplठspl-spl)splंspl॰spl्रsplरsplूspl्splङsplश्रsplङspl«splट्टsplड्डspl+splझspl/splठ्ठsplspl(spl)splहृspl”splङ्गsplन्नsplङ्कsplङ्खsplङ्घsplsplsplक्कspl=spl×spl्यspl;spl\'spl!spl%splट्ठspl.splद्मsplsplsplय्splक्षsplद्वspl“splॐsplsplsplषsplिँsplफ्splऊsplज्जsplत्रsplत्त्splद्भsplझsplझ्splॅsplल्लsplऋspl/splच्चsplत्र्splsplsplऽsplsplsplspl–spl—splध्रsplड्डspl‘splझ्‍splद्रspl्रsplठsplुsplूsplध्रsplङ्घsplफ्‍spl“spl”spl-spl—splज्ञ्‍splद्धsplघ्‍splर्‍splरूsplङ्गsplङ्गspl";
		me.EngFont = "splsplasplbsplcspldsplesplfsplgsplhsplispljsplkspllsplmsplsplnsplosplpsplqsplrsplsspltsplusplvsplwsplxsplysplzsplAsplBsplCsplDsplEsplFsplGsplHsplIsplJsplKsplLsplMsplNsplOsplPsplQsplRsplSsplTsplUsplVsplWsplXsplYsplZspl1spl2spl3spl4spl5spl6spl7spl8spl9spl0spl.spl:spl,spl;spl(spl*spl!spl@spl?spl&#39;spl)spl]spl[spl}spl{spl`spl~spl#spl$spl%spl^spl&amp;splspl_spl+spl=spl|spl/spl&quot;spl\\spl&lt;spl>splªspl«spl§spl°spl±spl´splµspl¶spl¯spl¸spl¹splÅsplÆsplÇsplÌsplÍsplÎsplÏsplÒsplÓsplÕsplÖspl×splØsplÙsplÚsplÛsplÜsplÝsplÞsplßsplàsplásplâsplãsplåsplæsplçsplèsplésplêsplësplìsplísplîsplïsplðsplñsplòsplósplôsplõsplöspl÷spløsplùsplsplˉspl˜splμsplspl-spl—spl‘spl„spl•spl…spl‰spl›spl«spl&spl'spl\"spl„spl‹splˆspl“spl”spl–spl—spl¡spl¢spl£spl¥spl¿splËspl╦";
        me.objCtrls = {}
    }
    AutoConvertBetweenEnglishToTraditional(field, e) {
		var me = this;
		if (field) {
			var nm = 'obj_' +  '1' 
            // field.id.replace("-", "_");
			me.objCtrls[nm] = me.objCtrls[nm] || me.unicode_const();
			e.preventDefault(); //should must disable keypress event
			var unicode = e.charCode ? e.charCode : e.keyCode; //	e.keyCode;
			var check = true;
			if (check) {
				var new_value = me.objCtrls[nm].toUnicode(String.fromCharCode(unicode), unicode, field);
				if (!new_value) {
					new_value = String.fromCharCode(unicode);
					var orginal_new_value = new_value;
					new_value = new_value.replace(/=/g, ".");
					new_value = new_value.replace(/_/g, ")");
					new_value = new_value.replace(/Ö/g, "=");
					new_value = new_value.replace(/Ù/g, ";");
					new_value = new_value.replace(/…/g, "‘");
					new_value = new_value.replace(/Ú/g, "’");
					new_value = new_value.replace(/Û/g, "!");
					new_value = new_value.replace(/Ü/g, "%");
					new_value = new_value.replace(/æ/g, "“");
					new_value = new_value.replace(/Æ/g, "”");
					new_value = new_value.replace(/±/g, "+");
					new_value = new_value.replace(/-/g, "(");
					new_value = new_value.replace(/</g, "?");
					var final_new_value = new_value;
					if (orginal_new_value == final_new_value)
						if (final_new_value != " ")
							return;

				}
				// me.objCtrls[nm].insertAtCursor(field, new_value, 0);
                return new_value
				//disable key press
			}

		}
	}
    toUnicode(char, keyChar, fld) {
		var me = this,
			font = me.EngFont,
			unicode = me.NepFont;
		font = (font.split('spl'));
		unicode = (unicode.split('spl'));
		var init_check = Array('e', 'I', 'i', ')', 'f', 'c', 'Q', 'k', 'O', 'q');
		if (me.getUcIndex(init_check, char) != -1)
			me.buffStart = true;
		if (me.buffStart)
			me.buffer += char;
		if (me.trim(char) == '') {
			me.buffStart = false;
			me.buffer = '';
		}
		me.cursor_position_before_hand = me.cursor_position_after_hand;
		// me.cursor_position_after_hand = me.doGetCaretPosition(fld);
		if (me.caseA(me.buffer)) {
			buffer_text = me.caseA(me.buffer);
			me.found = true;
			if (buffer_text == 'ष' || buffer_text == 'ण') {
				back_track = 2;
				me.stepBack = 1;
			} else if (me.trim(buffer_text) == 'क्ष') {
				back_track = 4;
				me.stepBack = 1;
			} else if (me.trim(buffer_text) == 'क्त' || me.trim(buffer_text) == 'क्र')
				back_track = 3;
			else
				back_track = 1;
			if (me.cursor_position_after_hand == me.cursor_position_before_hand + back_track || me.cursor_position_after_hand == me.cursor_position_before_hand) {
				// me.insertAtCursor(fld, me.trim(buffer_text), back_track);
				return null;
			} 
            else {
				me.buffStart = false;
				me.buffer = '';
			}
		} else if (me.buffer.length > 1) {
			me.buffStart = false;
			me.buffer = '';
			if (me.getUcIndex(init_check, char) != -1) {
				me.buffStart = true;
				me.buffer += char;
			}
		}

		if (unicode[me.getUcIndex(font, char)] != 'undefined')
			return unicode[me.getUcIndex(font, char)];
	}
    doGetCaretPosition(ctrl) {
		var CaretPos = 0;
		// var el = Ext.get(ctrl.inputId);
		// IE Support
		if (document.selection) {

			ctrl.focus();
			var Sel = document.createRange();

			Sel.moveStart('character', -ctrl.value.length);

			CaretPos = Sel.text.length;
		}
		// Firefox support
		// else if (el.dom.selectionStart || el.dom.selectionStart == '0')
		// 	CaretPos = el.dom.selectionStart;

		return (CaretPos);
	}
    caseA(val) {
		var me = this;
		var index_case_a = new Array('em', 'If', 'if', ')f', 'f]', 'f}', 'cf', 'cf]', 'cf}', 'Qm', 'km', 'O{', 'qm');
		var value_case_a = new Array('झ', 'क्ष ', 'ष', 'ण', 'ो', 'ौ', 'आ', 'ओ', 'औ', 'क्त', 'फ', 'ई', 'क्र');
		if (me.getUcIndex(index_case_a, val) != -1)
			return value_case_a[me.getUcIndex(index_case_a, val)];
		else
			return false;
	}
    insertAtCursor(myField, myValue, back_track) {
		var me = this,
			pos = me.doGetCaretPosition(myField),
			val = null;
		// var el = Ext.get(myField.inputId);
		if (document.selection) {
			if (!this.found) {
				myField.focus();
				sel = document.createRange();
				sel.text = myValue;
				sel.select();
			} else {
				val = myField.value.substring(0, pos - back_track) + myValue + myField.value.substring(pos, myField.value.length);
				myField.value = val;
				var range = el.dom.createTextRange();
				range.collapse(true);
				range.moveEnd('character', pos - me.stepBack);
				range.moveStart('character', pos - me.stepBack);
				range.select();
				me.found = false;
				me.stepBack = 0;
			}
		}

		//MOZILLA/NETSCAPE support
		else if (myField.dom.selectionStart || myField.dom.selectionStart == '0') {
			var startPos = myField.dom.selectionStart - back_track;
			var endPos = myField.dom.selectionEnd;
			var newEndPos = startPos + myValue.length;
			if (myField.id.match('Combo') != null) {
				if (myField.id.match('Combo').length >= 1 && myField.value === null) {
					myField.value = "";
				}
			}
			if (myField.value === null || myField.value === undefined) {
				return false;
			}
			val = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
			//myField.value += val;
			myField.setValue(val);
			//myField.selectText(startPos+1, startPos+1);
			myField.dom.setSelectionRange(newEndPos, newEndPos);
		} else {
			var newEndPos = myField.value.length + myValue.length;
			myField.value += myValue;
			// var el = Ext.get(myField.inputId);

			myField.dom.setSelectionRange(newEndPos - 1, newEndPos - 1);



			//myField.setValue(myField.value + myValue);
			//myField.selectText(newEndPos, newEndPos);
		}
	}

    getUcIndex(arr, ch) {
		var me = this,
			myPosition = -1;
		for (var i = 0; i < arr.length; i++) {
			if (me.trim(arr[i]) == me.trim(ch)) {
				myPosition = i;
				break;
			}
		}

		return myPosition;
	}
	LTrim(value) {
		var re = /\s*((\S+\s*)*)/;
		return value.replace(re, "$1");
	}
	// Removes ending whitespaces
	RTrim(value) {
		var re = /((\s*\S+)*)\s*/;
		return value.replace(re, "$1");
	}
	// Removes leading and ending whitespaces
	trim(value) {
		return this.LTrim(this.RTrim(value));
	}
	unicode_const() {
		var me = this;
		return {
			EngFont: me.EngFont,
			NepFont: me.NepFont,
			buffer: '',
			found: false,
			buffStart: false,
			stepBack: 0,
			cursor_position_before_hand: 0,
			cursor_position_after_hand: 0,
			toUnicode: me.toUnicode,
			insertAtCursor: me.insertAtCursor,
			doGetCaretPosition: me.doGetCaretPosition,
			caseA: me.caseA,
			getUcIndex: me.getUcIndex,
			trim: me.trim,
			LTrim: me.LTrim,
			RTrim: me.RTrim
		};
	}

}