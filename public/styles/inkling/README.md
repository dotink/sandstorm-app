# Give Your StyleSheets a Clue

inKLing is a small pseudo-opinionated CSS "framework" which provides helpful
resets and defaults to make your styling faster.  It uses some good ideas from
HTML5 (new element names) as class names and adds suggested classes with sane
default styling that makes many tasks a breeze.

Using and getting accustom to inKLing will do a few things.  Firstly, it will
familiarize you with newer HTML5 elements, since the suggested classes work
within those naming conventions.  Additionally, it will likely enforce pretty
clean markup, since certain things simply won't look right othwerise.

## Why Did We Do It?

There's a growing trend to create complex frameworks for rapid prototyping.
Most grid systems fall under this concept, however, often times class names
are completely non-semantic, or, even if they suggest aliasing and/or use
more semantic names to start with, they violate separation of concerns by
tying styles to class names.

We recognize that CSS selectors are called selectors for a reason, it uses
HTML class names to style elements.  Most grid systems and similar frameworks
turn this on its head, and HTML uses CSS class names to style elements.

Wherever inKling provides significant default styling, it is on classes which
are vague but meaningful enough that they can be overruled without the class
name losing it's meaning.  It also focuses on attacking the truly redundant
tasks, not those things which you *should* spend time to think about.

## Goals
* Keep things as semantic as possible
* Don't do too much
* Provide sane defaults and strong suggestions

## How Do You Use It?

Check out the source of the example at <http://dotink.github.com/inKLing/>
to get an idea of what you work with.
