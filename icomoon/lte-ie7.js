/* Use this script if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-tags' : '&#xe000;',
			'icon-alarm' : '&#xe002;',
			'icon-bubble' : '&#xe003;',
			'icon-bubbles' : '&#xe004;',
			'icon-bookmarks' : '&#xe005;',
			'icon-calendar' : '&#xe00b;',
			'icon-google-plus' : '&#xe00d;',
			'icon-feed' : '&#xe00e;',
			'icon-twitter' : '&#xe00f;',
			'icon-linkedin' : '&#xe010;',
			'icon-trophy' : '&#xe011;',
			'icon-code' : '&#xe012;',
			'icon-arrow-up' : '&#xe013;',
			'icon-arrow-right' : '&#xe014;',
			'icon-mail' : '&#xe006;',
			'icon-location' : '&#xe007;',
			'icon-phone' : '&#xe008;',
			'icon-heart' : '&#xe00a;',
			'icon-search' : '&#xe001;',
			'icon-list' : '&#xe009;',
			'icon-info' : '&#xe00c;',
			'icon-more' : '&#xe015;',
			'icon-file' : '&#xe016;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};