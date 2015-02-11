/* JavaScript Document
 * @author Farhood Rashidi
 * @date 12/07/2014
 */

var value = element(by.binding('value | date: "yyyy-MM-dd"'));
var valid = element(by.binding('calendar.input.$valid'));
var input = element(by.model('value'));

function setInput(val) {
   var scr = "var ipt = document.getElementById('date'); " +
   "ipt.value = '" + val + "';" +
   "angular.element(ipt).scope().$apply(function(s) { s.calendar[ipt.name].$setViewValue('" + val + "'); });";
   browser.executeScript(scr);
}

it('should initialize to model', function() {
   expect(value.getText()).toContain('2015-10-22');
   expect(valid.getText()).toContain('calendar.input.$valid = true');
});

it('should be invalid if empty', function() {
   setInput('');
   expect(value.getText()).toEqual('value =');
   expect(valid.getText()).toContain('calendar.input.$valid = false');
});

it('should be invalid if over max', function() {
   setInput('2015-01-01');
   expect(value.getText()).toContain('');
   expect(valid.getText()).toContain('calendar.input.$valid = false');
});

