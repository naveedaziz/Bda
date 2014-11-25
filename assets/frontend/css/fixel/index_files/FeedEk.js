/*FeedEk jQuery RSS/ATOM Feed Plugin v2.0
* http://jquery-plugins.net/FeedEk/FeedEk.html  
* https://github.com/enginkizil/FeedEk
* Author : Engin KIZIL http://www.enginkizil.com */
(function ($) {
    $.fn.FeedEk = function (opt) {
        var def = $.extend({ FeedUrl: "http://rss.cnn.com/rss/edition.rss",
            MaxCount: 5,
            ShowDesc: true,
            ShowPubDate: true,
            CharacterLimit: 0,
            TitleLinkTarget: "_blank",
            DateFormat: "",
            DateFormatLang: "en"
        }, opt);
        var id = $(this).attr("id"), i, s = "", dt;
        //$("#" + id).empty().append('<img src="loader.gif" />');
        $.ajax({
            url: "http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=" + def.MaxCount + "&output=json&q=" + encodeURIComponent(def.FeedUrl) + "&hl=en&callback=?",
            dataType: "json",
            success: function (data) {
                $("#" + id).empty();
                s+= "<img alt='Facebook' src='/img/icons/icon_facebook.png'/>";
                $.each(data.responseData.feed.entries, function (e, item) {
                 s += "<a href='"+item.link+"' target='" + def.TitleLinkTarget + "' title='TrafficOnlineJLT'><b>TrafficOnlineJLT</b><span>"+ item.title + "</span>";
                    if (def.ShowPubDate) {
                        dt = new Date(item.publishedDate);
                        s += '<br /><i><u>Shared</u></i>&nbsp;<i class="date_shared" title=' + dt.toString() + ' >' + dt.toLocaleDateString() + "</i>"
                    }
                });
                $("#" + id).append(s + "</a>")
                $('.date_shared').timeago();
            }
        })
    }
})(jQuery);