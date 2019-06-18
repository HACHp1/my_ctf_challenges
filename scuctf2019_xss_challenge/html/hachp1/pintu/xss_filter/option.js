whiteList=[];
var filterXSSOptions = {
    allowCommentTag: true,
    whiteList: whiteList,
    escapeHtml: function (html) {
        return html.replace(/<(?!!--)/g, '&lt;').replace(/-->/g, '-->').replace(/>/g, '&gt;').replace(/-->/g, '-->')
    },
    onIgnoreTag: function (tag, html, options) {
        if (tag === '!--') {
            // 保留注释
            return html
        }
    },
    onTagAttr: function (tag, name, value, isWhiteAttr) {
        if (isWhiteAttr && (name === 'src'||name === 'href') && linkRegex.test(value)) {
            return name + '="' + filterXSS.escapeAttrValue(value) + '"'
        }
        if (isWhiteAttr && (tag === 'img' && name === 'src') && dataUriRegex.test(value)) {
            return name + '="' + filterXSS.escapeAttrValue(value) + '"'
        }
    },
    onIgnoreTagAttr: function (tag, name, value, isWhiteAttr) {
        if (name.substr(0, 5) === 'data-' || window.whiteListAttr.indexOf(name) !== -1) {
            return name + '="' + filterXSS.escapeAttrValue(value) + '"'
        }
    }
}
function preventXSS (html) {
    return filterXSS(html, filterXSSOptions)
}
