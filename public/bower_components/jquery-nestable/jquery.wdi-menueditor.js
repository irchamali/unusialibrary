/*
* Menu Editor Plugin
* @author Agus Prawoto Hadi
* @website https://jagowebdev.com
* @release 2019-02-09
* @updated 2021-06-12
* @copyright: Bebas digunakan dan dicustom untuk penggunaan sendiri. 
* Dilarang keras mendistribusikan, menjual, menggunakan script ini dalam aplikasi berbayar tanpa seijin penulis
* fn.np = custom mestable plugin
*/
;(function($)
{
	$.extend($.fn.np.prototype, 
	{
		customInit : function() 
		{
			this.addOptions();
			this.addButton();
			var list_container = this.el;
			var plugin = this;
			$button = list_container.find('span');
			$button.off().click(function(e) 
			{
				var action = $(this).data('action'),
					$list = $(this).parent();
					
				if (action === 'btn-delete') {
					result = plugin.options.beforeRemove($list, plugin);
					if (result) {
						plugin.deleteList($list);
					}
				}
				
				if (action === 'btn-edit') {
					plugin.options.editBtnCallback($list);
				}
			});
			
			list_container.find('li').on('change', function(){
				plugin.options.onChange($list, plugin);
			});
			
			// Minus button on parent
			$.each(plugin.el.find(plugin.options.itemNodeName), function(k, el) {
                plugin.setParent($(el));
            });
		}, 
		
		deleteList: function(item) 
		{
			$parent = item.parent();
			item.remove();
			if ($parent.children().length == 0) {
			   this.unsetParent($parent.parent());
			}
		},
		
		addOptions: function() {
			var addOptions = {
				/* Changes: Add Close Button */
				removeBtnHTML 	: '<span class="text-danger pull-right mt-3 mr-4" data-action="btn-delete"><i class="fas fa-trash-alt fa-lg mr-2"></i></span>',
				editBtnHTML 	: '<span class="text-success pull-right mt-3 mr-2" data-action="btn-edit"><i class="fas fa-pencil-alt fa-lg mr-3"></i></span>',
				editBtnCallback	: function(){},
				beforeRemove	: function(){return true},
			}
			this.options = $.extend({}, addOptions, this.options);
		},
		
		addButton: function () {
			var options = this.options;
			$.each(this.el.find(this.options.itemNodeName), function(i, el) {
				$removeBtn = $(options.removeBtnHTML).addClass('dd-remove');
				$editBtn = $(options.editBtnHTML);
				$(el).prepend($editBtn);
				$(el).prepend($removeBtn);
			})
		},
		unsetParent: function(li) {
			li.children(this.options.listNodeName).remove();
			li.removeClass(this.options.collapsedClass);
			li.children('[data-action="expand"]').remove();
            li.children('[data-action="collapse"]').remove();
		},
		detach : function() {
			$.data(this.el[0], 'wdiMenuEdiitor', null);
		}
	}); 

	$.fn.wdiMenuEditor = function(options) 
	{
		var value,
			plugin;
			
		this.each(function(i, el) 
		{
			var plugin = $.data(el, 'wdiMenuEdiitor');
			 if (plugin) {
				if  (typeof options === 'string' && typeof plugin[options] === 'function') {
					value =  plugin[options]();
				}
			} else {
				var plugin = new $.fn.np(el, options);
				plugin.customInit();
				$.data(el, 'wdiMenuEdiitor', plugin);
			}
		})
		
		return value || plugin;
	}
})($);