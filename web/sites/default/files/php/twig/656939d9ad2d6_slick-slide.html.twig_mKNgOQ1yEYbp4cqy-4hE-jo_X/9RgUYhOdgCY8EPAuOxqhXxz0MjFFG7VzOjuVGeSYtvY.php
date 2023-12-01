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

/* modules/contrib/slick/templates/slick-slide.html.twig */
class __TwigTemplate_4609ad56649a04e78d55ea95259b05e6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'slick_slide' => [$this, 'block_slick_slide'],
            'slick_caption' => [$this, 'block_slick_caption'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        $context["classes"] = [0 => ("slide--" . $this->sandbox->ensureToStringAllowed(        // line 22
($context["delta"] ?? null), 22, $this->source)), 1 => ((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 23
($context["item"] ?? null), "slide", [], "any", false, false, true, 23))) ? ("slide--text") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 24
($context["settings"] ?? null), "layout", [], "any", false, false, true, 24)) ? (("slide--caption--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "layout", [], "any", false, false, true, 24), 24, $this->source)))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,         // line 25
($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) ? (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "class", [], "any", false, false, true, 25)) : (""))];
        // line 29
        $context["content_classes"] = [0 => ((twig_get_attribute($this->env, $this->source,         // line 30
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 30)) ? ("slide") : ("")), 1 => (( !twig_get_attribute($this->env, $this->source,         // line 31
($context["settings"] ?? null), "detroy", [], "any", false, false, true, 31)) ? ("slide__content") : (""))];
        // line 35
        $context["caption_classes"] = [0 => "slide__caption"];
        // line 39
        $context["use_blazy"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["blazies"] ?? null), "use", [], "any", false, false, true, 39), "theme_blazy", [], "any", false, false, true, 39);
        // line 40
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 40)) {
            // line 41
            echo "<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 41), 41, $this->source), "html", null, true);
            echo ">";
        }
        // line 44
        if (($context["use_blazy"] ?? null)) {
            // line 45
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["item"] ?? null), 45, $this->source), "html", null, true);
        } else {
            // line 47
            echo "    ";
            // line 51
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "use_ca", [], "any", false, false, true, 51)) {
                echo "<div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 51), 51, $this->source), "html", null, true);
                echo ">";
            }
            // line 52
            ob_start();
            // line 53
            echo "        ";
            $this->displayBlock('slick_slide', $context, $blocks);
            // line 60
            echo "      ";
            $context["slide"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 62
            if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 62)) {
                // line 63
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["slide"] ?? null), 63, $this->source), "html", null, true);
            }
            // line 66
            if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 66)) {
                // line 67
                $this->displayBlock('slick_caption', $context, $blocks);
            }
            // line 92
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "use_ca", [], "any", false, false, true, 92)) {
                echo "</div>";
            }
        }
        // line 95
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "wrapper", [], "any", false, false, true, 95)) {
            // line 96
            echo "</div>";
        }
    }

    // line 53
    public function block_slick_slide($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "split", [], "any", false, false, true, 54)) {
            // line 55
            echo "<div class=\"slide__media\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
            echo "</div>
          ";
        } else {
            // line 57
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "slide", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
        }
    }

    // line 67
    public function block_slick_caption($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 68)) {
            echo "<div class=\"slide__constrained\">";
        }
        // line 69
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["caption_attributes"] ?? null), "addClass", [0 => ($context["caption_classes"] ?? null)], "method", false, false, true, 69), 69, $this->source), "html", null, true);
        echo ">";
        // line 70
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 70), "overlay", [], "any", false, false, true, 70)) {
            // line 71
            echo "<div class=\"slide__overlay\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 71), "overlay", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
            echo "</div>";
            // line 72
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 72)) {
                echo "<div class=\"slide__data\">";
            }
        }
        // line 74
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 74), "title", [], "any", false, false, true, 74)) {
            // line 75
            echo "<h2 class=\"slide__title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 75), "title", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            echo "</h2>";
        }
        // line 77
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 77), "alt", [], "any", false, false, true, 77)) {
            // line 78
            echo "<p class=\"slide__description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 78), "alt", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
            echo "</p>";
        }
        // line 80
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 80), "data", [], "any", false, false, true, 80)) {
            // line 81
            echo "<div class=\"slide__description\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 81), "data", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
            echo "</div>";
        }
        // line 83
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 83), "link", [], "any", false, false, true, 83)) {
            // line 84
            echo "<div class=\"slide__link\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 84), "link", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
            echo "</div>";
        }
        // line 86
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "caption", [], "any", false, false, true, 86), "overlay", [], "any", false, false, true, 86) && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "data", [], "any", false, false, true, 86))) {
            echo "</div>";
        }
        // line 87
        echo "</div>";
        // line 88
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "fullwidth", [], "any", false, false, true, 88)) {
            echo "</div>";
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick-slide.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 88,  177 => 87,  173 => 86,  168 => 84,  166 => 83,  161 => 81,  159 => 80,  154 => 78,  152 => 77,  147 => 75,  145 => 74,  140 => 72,  136 => 71,  134 => 70,  130 => 69,  126 => 68,  122 => 67,  117 => 57,  111 => 55,  109 => 54,  105 => 53,  100 => 96,  98 => 95,  93 => 92,  90 => 67,  88 => 66,  85 => 63,  83 => 62,  80 => 60,  77 => 53,  75 => 52,  69 => 51,  67 => 47,  64 => 45,  62 => 44,  57 => 41,  55 => 40,  53 => 39,  51 => 35,  49 => 31,  48 => 30,  47 => 29,  45 => 25,  44 => 24,  43 => 23,  42 => 22,  41 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for the individual slick item/slide template.
 *
 * Available variables:
 * - attributes: An array of attributes to apply to the element.
 * - item.slide: A renderable array of the main image/background.
 * - item.caption: A renderable array containing caption fields if provided:
 *   - title: The individual slide title.
 *   - alt: The core Image field Alt as caption.
 *   - link: The slide links or buttons.
 *   - overlay: The image/audio/video overlay, or a nested slick.
 *   - data: any possible field for more complex data if crazy enough.
 * - settings: An array containing the given settings.
 *
 * @see template_preprocess_slick_slide()
 */
#}
{%
  set classes = [
    'slide--' ~ delta,
    item.slide is empty ? 'slide--text',
    settings.layout ? 'slide--caption--' ~ settings.layout|clean_class,
    settings.class ? settings.class
  ]
%}
{%
  set content_classes = [
    settings.detroy ? 'slide',
    not settings.detroy ? 'slide__content'
  ]
%}
{%
  set caption_classes = [
    'slide__caption',
  ]
%}
{% set use_blazy = blazies.use.theme_blazy  %}
{%- if settings.wrapper -%}
  <div{{ attributes.addClass(classes) }}>
{%- endif -%}

  {%- if use_blazy -%}
    {{- item -}}
  {% else %}
    {# @todo remove all below at 3.x for theme_blazy(). If you need to modify
    anything, please use MYTHEME_preprocess_blazy() instead, starting at 3.x,
    or better just use CSS for more reliable theming. FYI, theme_blazy()
    offers greater possibility and versatility, that is why it is deprecated. #}
    {%- if settings.use_ca -%}<div{{ content_attributes.addClass(content_classes) }}>{%- endif -%}
      {% set slide %}
        {% block slick_slide %}
          {%- if settings.split -%}
            <div class=\"slide__media\">{{- item.slide -}}</div>
          {% else %}
            {{- item.slide -}}
          {%- endif -%}
        {% endblock %}
      {% endset %}

      {%- if item.slide -%}
        {{- slide -}}
      {%- endif -%}

      {%- if item.caption -%}
        {% block slick_caption %}
          {%- if settings.fullwidth -%}<div class=\"slide__constrained\">{%- endif -%}
            <div{{ caption_attributes.addClass(caption_classes) }}>
              {%- if item.caption.overlay -%}
                <div class=\"slide__overlay\">{{ item.caption.overlay }}</div>
                {%- if settings.data -%}<div class=\"slide__data\">{%- endif -%}
              {%- endif -%}
              {%- if item.caption.title -%}
                <h2 class=\"slide__title\">{{ item.caption.title }}</h2>
              {%- endif -%}
              {%- if item.caption.alt -%}
                <p class=\"slide__description\">{{ item.caption.alt }}</p>
              {%- endif -%}
              {%- if item.caption.data -%}
                <div class=\"slide__description\">{{- item.caption.data -}}</div>
              {%- endif -%}
              {%- if item.caption.link -%}
                <div class=\"slide__link\">{{ item.caption.link }}</div>
              {%- endif -%}
              {%- if item.caption.overlay and settings.data -%}</div>{%- endif -%}
            </div>
          {%- if settings.fullwidth -%}</div>{%- endif -%}
        {% endblock %}
      {%- endif -%}

    {%- if settings.use_ca -%}</div>{%- endif -%}
  {%- endif -%}

{%- if settings.wrapper -%}
  </div>
{%- endif -%}
", "modules/contrib/slick/templates/slick-slide.html.twig", "D:\\wamp64\\www\\cuppies\\web\\modules\\contrib\\slick\\templates\\slick-slide.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 21, "if" => 40, "block" => 53);
        static $filters = array("clean_class" => 24, "escape" => 41);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape'],
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
