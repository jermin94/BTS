(function($) {
    $.fn.formToWizard = function(options) {
        options = $.extend({
            submitButton: ""
        }, options);

        var element = this;

        var steps = $(element).find("fieldset");
        var count = steps.size();
        var submmitButtonName = "#" + options.submitButton;
        $(submmitButtonName).hide();

        steps.each(function(i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands'></p>");						$(this).before("<div class='meter'><span style='width:"+ 16*i +"%'></span></div>");
            if (i === 0) {
                createNextButton(i);
                selectStep(i);
            }
            else if (i == count - 1) {
                $("#step" + i).hide();
                createPrevButton(i);
            }
            else {
                $("#step" + i).hide();
                createPrevButton(i);
                createNextButton(i);
            }
        });

        function createPrevButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='monBouton'>< Retour</a>");

            $("#" + stepName + "Prev").bind("click", function(e) {
                $("#" + stepName).hide();
                $("#step" + (i - 1)).show();
                $(submmitButtonName).hide();
                selectStep(i - 1);
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
            $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='monBouton'>Suivant ></a>");

            $("#" + stepName + "Next").bind("click", function(e) {
                var valid = true;
                $("#" + stepName + " select:visible").each(function() {
                    if ($(this).css('display') !== 'none') {
                        if (!$(this).val() || $(this).val() === '') {
                            valid = false;
                            $(this).addClass('error');
                            $("#erreurNonRemplie").show();

                        } else {
                            valid = true;
                            $(this).removeClass('error');
                            $("#erreurNonRemplie").css("display", "none");
                            
                        }
                    }
                });

                $("#" + stepName + " input.nombre").each(function() {
                    if($(this).is(':visible')){
                        if ($(this).val().length === 0) {
                            $("#erreurNonRemplie").css("display", "inline-block");
                            $(this).addClass('error');
                            valid = false;
                        }
                    }
                });
                if (valid === true) {
                    $("#" + stepName).hide();
                    $("#step" + (i + 1)).show();
                    if (i + 2 === count) {
                        $(submmitButtonName).show();
                    }
                    selectStep(i + 1);
                }

            });
        }







        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");
        }

    };
})(jQuery); 