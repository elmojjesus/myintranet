var modalAjaxLink = modalAjaxLink || (function() {

    function modalAjaxLink() {}

    var link;

    var parseAjax = function(mfpResponse) {
        var mfpResponseData = $("<!---->" + mfpResponse.data).filter(':not(script,style)');
        var content;
        if (mfpResponseData.length > 1 || mfpResponseData.get(0).tagName != "FORM") {
            content = $("<form class=\"form-modal-ajax\"></form>").append(mfpResponseData);
        } else {
            content = mfpResponseData;
            content.addClass("form-modal-ajax");
        }

        var title = filterTitle(content);
        var footer = filterFooter(content);
        var main = filterMain(content);
        var script = filterScript(mfpResponse.data);
        var style = filterStyle(mfpResponse.data);

        content.append($('<!----><div class="modal-header">\
                <button title="Close (Esc)" type="button" class="mfp-close">\
                    <span aria-hidden="true">×</span>\
                    <span class="sr-only">Close</span></button>\
                </button>\
                ' + title + '\
            </div>\
            <div class="modal-body">' + main + '</div>\
            <div class="modal-footer">' + footer + script + style + '</div>\
        '));

        mfpResponse.data = '<div class="modal-dialog">\
            <div class="modal-content">\
            ' + content[0].outerHTML + '\
            </div>\
        </div>';
    };

    var filterTitle = function(content) {
        var title = "";
        if (link.attr('data-title')) {
            title = "<h1 class='modal-title'>" + link.attr('data-title') + "</h1>";
        }
        var dataTitle = content.filter('.data-title');
        if (!dataTitle || !dataTitle.length) {
            dataTitle = content.find('.data-title');
        }
        dataTitle.each(function() {
            title += $(this).addClass('modal-title')[0].outerHTML;
        });
        dataTitle.remove();
        return title;
    };

    var filterFooter = function(content) {
        var footer = "";
        if (link.attr('data-footer')) {
            footer = link.attr('data-footer');
        }
        var dataFooter = content.filter('.data-footer');
        if (!dataFooter || !dataFooter.length) {
            dataFooter = content.find('.data-footer');
        }
        dataFooter.each(function() {
            footer = this.outerHTML;
        });
        dataFooter.remove();
        return footer;
    };

    var filterMain = function(content) {
        var main = "";
        content.children().each(function() {
            main += this.outerHTML;
        });
        content.children().remove();
        return main;
    };

    var filterScript = function(data) {
        var script = "";
        var dataScript = $("<!---->" + data).filter('script');
        dataScript.each(function() {
            script += this.outerHTML;
        });
        return script;
    };

    var filterStyle = function(data) {
        var style = "";
        var dataStyle = $("<!---->" + data).filter('style');
        dataStyle.each(function() {
            style += this.outerHTML;
        });
        return style;
    };

    var ajaxContentAdded = function() {
        var modal = this.content.find('.form-modal-ajax');
        var form = $('form.form-modal-ajax, .form-modal-ajax form');

        var url = "";
        if (form.attr('action')) {
            url = form.attr('action');
        } else if(modal.attr('action')) {
            url = modal.attr('action');
        } else {
            url = link.attr('data-mfp-src');
        }
        form.attr('action', 'javascript:void(0);');

        modal.find('input[type="submit"]').on('click', function() {
            var data = new FormData(form[0]);
            data.append($(this).attr('name'), $(this).val());
            $.ajax({
                url: url,
                type: form.attr('method') || modal.attr('method') || 'POST',
                data: data,
                success: function(e) { onSuccessAjax(modal, e) },
                error: function(e) { console.error(e) },
                processData: false,
                contentType: false,
            });
        });
    };

    var onSuccessAjax = function(modal, data) {
        modal.children('.input-error ~ ul').remove();
        modal.find('.input-error ~ ul').remove();
        if (data == void 0 || data.length == 0 || data['errors'] == void 0) {
            $.magnificPopup.close();
        }
        
        var valuesAreStrings = function(hash) {
          for (var i in hash) {
            if (typeof hash[i] !== "string") {
              return false;
            }
          }
          return true;
        }

        var calculateTarget = function(messages, func, level, target) {
            level = level || 0;
            target = target || "";
            for (var i in messages) {
                var message = messages[i];

                var subTarget;
                if (level) {
                    subTarget = target + "[" + i + "]";
                } else {
                    subTarget = i;
                }

                if (valuesAreStrings(message)) {
                    var valuesMessages = Object.keys(message).map(function(k) {
                        return message[k];
                    });
                    func(subTarget, valuesMessages);
                } else {
                    calculateTarget(message, func, level + 1, subTarget);
                }
            }
        }

        var showErrors = function(target, messages) {
            var errorsHtml = "<ul class='input-error'><li>" + messages.join('</li><li>') + "</li></lu>";
            var element;
            if ($('.error[name="' + target + '"]').length != 0) {
                element = $('.error[name="' + target + '"]');
            } else {
                element = $('[name="' + target + '"]').closest('.input-error');
            }
            element.after(errorsHtml);
            element.addClass('input-error');
            $('.box-white.date ~ ul').parent().css('padding-bottom','0');
        };

        calculateTarget(data['errors'], showErrors);

        var showNotification = function(data) {
            data.value = data.value || "";
            if (data.type != void 0 || data.options != void 0) {
                data.options = data.options || {};
                data.options.className = data.options.className || data.type;
                $.notify(data.value, data.options);
            } else {
                $.notify(data.value);
            }
        };

        var notification = data['notification'];
        notification && showNotification(notification);

        var notifications = data['notifications'];
        for (var i in notifications) {
            showNotification(notifications[i]);
        }
        
        if(data['success'] == "reload"){
            window.location.reload();
        }

        if(data['redirect']){
            alert(data['redirect']);
            window.location.reload();
        }
    };

    modalAjaxLink.init = function(e) {
        link = $(e);
        if (!link.attr('data-mfp-src')) {
            console.error("'data-mfp-src' is required");
            return;
        }

        $.magnificPopup.open({
            items: {
                src: link.attr('data-mfp-src'),
                type: "ajax"
            },
            type: 'ajax',
            midClick: true,
            removalDelay: 0,
            showCloseBtn: false,
            callbacks: {
                parseAjax: parseAjax,
                open: function() {
                    $('.mfp-bg').addClass("modal-backdrop fade in");
                },
                ajaxContentAdded: ajaxContentAdded
            }
        });
    };

    return modalAjaxLink;
})();

$(function() {

    $('body').on('click', '.mfp-close, .cancelDelete, .cancelSave, .btn-mfp-close', function() {
        $.magnificPopup.close();
    });

    $('body').on('click', '.modal-ajax-link', function() {
        modalAjaxLink.init(this);
    });
});