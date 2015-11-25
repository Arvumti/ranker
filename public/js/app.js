var ViLogin = Backbone.View.extend({
	el:'.bb-link.bb-login',
	events: {
		'click #btnLogin': 'click_btnLogin',
	},
	initialize: function() {
		this.txtUsuario = this.$el.find('#username');
		this.txtPassword = this.$el.find('#password');
		this.CaptchaCode = this.$el.find('#CaptchaCode');

		this.alError = this.$el.find('.error-message');
	},
	click_btnLogin: function() {
		var that = this;
		/*$.post(window.location.href + 'login', {mail:this.txtUsuario.val(), password:this.txtPassword.val(), CaptchaCode:this.CaptchaCode.val()}).done(done);
		function done(data) {
			if(data.errmsg && data.errmsg.length > 0) {
				that.alError.removeClass('isHidden').find('.alert').text(data.errmsg);

				if(data.captchaHtml)
					$('.img-captcha').html(data.captchaHtml);
			}
			else
				window.location = window.location.href + '/principal';
		}*/

		var jData = new FormData($('form')[0]);

		var xhr = null;
		xhr = $.ajax({
			url: window.location.href + 'login',
			type: 'POST',
			data: jData,
			success: function(data) {
				if(data.errmsg && data.errmsg.length > 0) {
					that.alError.removeClass('isHidden').find('.alert').text(data.errmsg);

					if(data.captchaHtml)
						$('.img-captcha').html(data.captchaHtml);

					$('#CaptchaCode').val('');
				}
				else
					window.location = window.location.href + '/principal';
			},
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false
		});
	},
});

$(document).on('ready', inicio);

function inicio () {
	new ViLogin();
}