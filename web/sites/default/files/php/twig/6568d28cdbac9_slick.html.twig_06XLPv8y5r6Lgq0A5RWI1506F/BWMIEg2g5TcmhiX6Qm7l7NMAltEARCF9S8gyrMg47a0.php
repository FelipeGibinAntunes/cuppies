<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/slick/templates/slick.html.twig */
class __TwigTemplate_5f550eb7f877506e4517d11dad97adfa extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slick_content' => [$this, 'block_slick_content'],
            'slick_arrow' => [$this, 'block_slick_arrow'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        $context["classes"] = [0 => ((twig_get_attribute($this->env, $this->source,         // line 38
($context["settings"] ?? null), "unslick", [], "any", false, false, true, 38)) ? ("unslick") : ("")), 1 => ((twig_get_attribute($this->env, $this->source,         // line 39
($context["settings"] ?? null), "vertical", [], "any", false, false, true, 39)) ? ("slick--vertical") : ("")), 2 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 40
($context["settings"] ?? null), "attributes", [], "any", false, false, true, 40), "class", [], "any", false, false, true, 40)) ? (twig_join_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "attributes", [], "any", false, false, true, 40), "class", [], "any", false, false, true, 40), 40, $this->source), " ")) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,         // line 41
($context["settings"] ?? null), "skin", [], "any", false, false, true, 41)) ? (("slick--skin--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "skin", [], "any", false, false, true, 41), 41, $this->source)))) : ("")), 4 => ((twig_in_filter("boxed", twig_get_attribute($this->env, $this->source,         // line 42
($context["settings"] ?? null), "skin", [], "any", false, false, true, 42))) ? ("slick--skin--boxed") : ("")), 5 => ((twig_in_filter("split", twig_get_attribute($this->env, $this->source,         // line 43
($context["settings"] ?? null), "skin", [], "any", false, false, true, 43))) ? ("slick--skin--split") : ("")), 6 => ((twig_get_attribute($this->env, $this->source,         // line 44
($context["settings"] ?? null), "optionset", [], "any", false, false, true, 44)) ? (("slick--optionset--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "optionset", [], "any", false, false, true, 44), 44, $this->source)))) : ("")), 7 => ((        // line 45
array_key_exists("arrow_down_attributes", $context)) ? ("slick--has-arrow-down") : ("")), 8 => ((twig_get_attribute($this->env, $this->source,         // line 46
($context["settings"] ?? null), "asNavFor", [], "any", false, false, true, 46)) ? (("slick--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["display"] ?? null), 46, $this->source)))) : ("")), 9 => (((twig_get_attribute($this->env, $this->source,         // line 47
($context["settings"] ?? null), "slidesToShow", [], "any", false, false, true, 47) > 1)) ? ("slick--multiple-view") : ("")), 10 => (((twig_get_attribute($this->env, $this->source,         // line 48
($context["blazies"] ?? null), "count", [], "any", false, false, true, 48) <= twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "slidesToShow", [], "any", false, false, true, 48))) ? ("slick--less") : ("")), 11 => ((((        // line 49
($context["display"] ?? null) == "main") && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 49))) ? (("slick--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 49), 49, $this->source)))) : ("")), 12 => ((((        // line 50
($context["display"] ?? null) == "thumbnail") && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "thumbnail_caption", [], "any", false, false, true, 50))) ? ("slick--has-caption") : (""))];
        // line 54
        $context["arrow_classes"] = [0 => "slick__arrow", 1 => ((twig_get_attribute($this->env, $this->source,         // line 56
($context["settings"] ?? null), "vertical", [], "any", false, false, true, 56)) ? ("slick__arrow--v") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 57
($context["settings"] ?? null), "skin_arrows", [], "any", false, false, true, 57)) ? (("slick__arrow--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "skin_arrows", [], "any", false, false, true, 57), 57, $this->source)))) : (""))];
        // line 60
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 60), 60, $this->source), "html", null, true);
        echo ">";
        // line 61
        if ( !twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "unslick", [], "any", false, false, true, 61)) {
            // line 62
            echo "<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "slick__slider"], "method", false, false, true, 62), 62, $this->source), "html", null, true);
            echo ">";
        }
        // line 65
        $this->displayBlock('slick_content', $context, $blocks);
        // line 69
        if ( !twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "unslick", [], "any", false, false, true, 69)) {
            // line 70
            echo "</div>
    ";
            // line 71
            $this->displayBlock('slick_arrow', $context, $blocks);
        }
        // line 85
        echo "</div>
";
    }

    // line 65
    public function block_slick_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 66
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["items"] ?? null), 66, $this->source), "html", null, true);
    }

    // line 71
    public function block_slick_arrow($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 72
        echo "      <nav";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["arrow_attributes"] ?? null), "addClass", [0 => ($context["arrow_classes"] ?? null)], "method", false, false, true, 72), 72, $this->source), "html", null, true);
        echo ">
        <button type=\"button\" data-role=\"none\" class=\"slick-prev\" aria-label=\"";
        // line 73
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_striptags(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "prevArrow", [], "any", false, false, true, 73), 73, $this->source))), "html", null, true);
        echo "\" tabindex=\"0\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "prevArrow", [], "any", false, false, true, 73), 73, $this->source)));
        echo "</button>
        ";
        // line 74
        if (array_key_exists("arrow_down_attributes", $context)) {
            // line 75
            echo "          <button";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["arrow_down_attributes"] ?? null), "addClass", [0 => "slick-down"], "method", false, false, true, 75), "setAttribute", [0 => "type", 1 => "button"], "method", false, false, true, 75), "setAttribute", [0 => "data-role", 1 => "none"], "method", false, false, true, 76), "setAttribute", [0 => "data-target", 1 => twig_get_attribute($this->env, $this->source,             // line 78
($context["settings"] ?? null), "downArrowTarget", [], "any", false, false, true, 78)], "method", false, false, true, 77), "setAttribute", [0 => "data-offset", 1 => twig_get_attribute($this->env, $this->source,             // line 79
($context["settings"] ?? null), "downArrowOffset", [], "any", false, false, true, 79)], "method", false, false, true, 78), 79, $this->source), "html", null, true);
            echo "></button>
        ";
        }
        // line 81
        echo "        <button type=\"button\" data-role=\"none\" class=\"slick-next\" aria-label=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_striptags(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "nextArrow", [], "any", false, false, true, 81), 81, $this->source))), "html", null, true);
        echo "\" tabindex=\"0\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "nextArrow", [], "any", false, false, true, 81), 81, $this->source)));
        echo "</button>
      </nav>
    ";
    }

    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 81,  114 => 79,  113 => 78,  111 => 75,  109 => 74,  103 => 73,  98 => 72,  94 => 71,  90 => 66,  86 => 65,  81 => 85,  78 => 71,  75 => 70,  73 => 69,  71 => 65,  66 => 62,  64 => 61,  60 => 60,  58 => 57,  57 => 56,  56 => 54,  54 => 50,  53 => 49,  52 => 48,  51 => 47,  50 => 46,  49 => 45,  48 => 44,  47 => 43,  46 => 42,  45 => 41,  44 => 40,  43 => 39,  42 => 38,  41 => 37,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for the Slick carousel template.
 *
 * This template holds 3 displays: main, thumbnail and overlay slicks in one.
 * Arrows are enforced, but toggled by JS accordingly. This allows responsive
 * object to enable and disable it as needed without losing context.
 *
 * Available variables:
 * - items: The array of items containing main image/video/audio, optional
 *     image/video/audio overlay and captions, and optional thumbnail
 *     texts/images.
 * - settings: A cherry-picked settings that mostly defines the slide HTML or
 *     layout, and none of JS settings/options which are defined at data-slick.
 * - attributes: The array of attributes to hold the main container classes, id.
 * - content_attributes: The array of attributes to hold optional RTL, id and
 *     data-slick containing JSON object aka JS settings the Slick expects to
 *     override default options. We don't store these JS settings in the normal
 *     <head>, but inline within data-slick attribute instead.
 *
 * Debug:
 * @see https://www.drupal.org/node/1906780
 * @see https://www.drupal.org/node/1903374
 * Use Kint: {{ kint(variable) }}
 * Dump all available variables and their contents: {{ dump() }}
 * Dump only the available variable keys: {{ dump(_context|keys) }}
 *
 * Note!
 * - Unlike Splide, Slick changed markups when being unslick since it doesn't
 *   use HTML list (UL > LI) to worry about, and it behaves with 1 slide.
 * - If you see blazies, it is used to interop with Splide, such as required by
 *   ElevateZoomPlus.
 */
#}
{%
  set classes = [
    settings.unslick ? 'unslick',
    settings.vertical ? 'slick--vertical',
    settings.attributes.class ? settings.attributes.class|join(' '),
    settings.skin ? 'slick--skin--' ~ settings.skin|clean_class,
    'boxed' in settings.skin ? 'slick--skin--boxed',
    'split' in settings.skin ? 'slick--skin--split',
    settings.optionset ? 'slick--optionset--' ~ settings.optionset|clean_class,
    arrow_down_attributes is defined ? 'slick--has-arrow-down',
    settings.asNavFor ? 'slick--' ~ display|clean_class,
    settings.slidesToShow > 1 ? 'slick--multiple-view',
    blazies.count <= settings.slidesToShow ? 'slick--less',
    display == 'main' and settings.media_switch ? 'slick--' ~ settings.media_switch|clean_class,
    display == 'thumbnail' and settings.thumbnail_caption ? 'slick--has-caption'
  ]
%}
{%
  set arrow_classes = [
    'slick__arrow',
    settings.vertical ? 'slick__arrow--v',
    settings.skin_arrows ? 'slick__arrow--' ~ settings.skin_arrows|clean_class
  ]
%}
<div{{ attributes.addClass(classes) }}>
  {%- if not settings.unslick -%}
    <div{{ content_attributes.addClass('slick__slider') }}>
  {%- endif -%}

  {% block slick_content %}
    {{- items -}}
  {% endblock %}

  {%- if not settings.unslick -%}
    </div>
    {% block slick_arrow %}
      <nav{{ arrow_attributes.addClass(arrow_classes) }}>
        <button type=\"button\" data-role=\"none\" class=\"slick-prev\" aria-label=\"{{ settings.prevArrow|t|striptags }}\" tabindex=\"0\">{{ settings.prevArrow|t }}</button>
        {% if arrow_down_attributes is defined %}
          <button{{ arrow_down_attributes.addClass('slick-down')
            .setAttribute('type', 'button')
            .setAttribute('data-role', 'none')
            .setAttribute('data-target', settings.downArrowTarget)
            .setAttribute('data-offset', settings.downArrowOffset) }}></button>
        {% endif %}
        <button type=\"button\" data-role=\"none\" class=\"slick-next\" aria-label=\"{{ settings.nextArrow|t|striptags }}\" tabindex=\"0\">{{ settings.nextArrow|t }}</button>
      </nav>
    {% endblock %}
  {%- endif -%}
</div>
", "modules/contrib/slick/templates/slick.html.twig", "D:\\wamp64\\www\\cuppies\\web\\modules\\contrib\\slick\\templates\\slick.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 37, "if" => 61, "block" => 65);
        static $filters = array("join" => 40, "clean_class" => 41, "escape" => 60, "striptags" => 73, "t" => 73);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['join', 'clean_class', 'escape', 'striptags', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
