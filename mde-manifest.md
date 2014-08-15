Markdown Extended specifications
================================ 

* version: 1.0-alpha
* source: http://github.com/markdown-extended/manifest

----

**Please note that this document is still a DRAFT of the final specifications: some work
remains before the first published version and all its content may change before this publication.**

TODOS

- global cleanup
- english !!

----

This document explains the "official" specifications of the *Markdown Extended* syntax
("**MDE**" in the rest of this document). It intends to be a concise and complete set 
of syntax's rules and tags to use to write under Markdown Extended and a reference to build 
parsers  implementations. It can be considered as the **Markdown Extended reference** for
any purpose. The goal of these specifications is NOT to explain *how to write a content* but
*how to build a content* using the Markdown Extended syntax.

To begin, please read the [introduction](#introduction).

This document is authored and maintained by Pierre Cassat ([@pierowbmstr][e-piwi])
and licensed under [Creative Commons - CC BY 3.0][cc-by-3] ; it is opened for discussion
or contribution, please refer to [the dedicated section](#contribute).

**Table of contents:**

-   [Introduction](#introduction)
-   [Origins of Markdown Extended](#origins-of-markdown-extended)
-   [Scope of these specifications](#scope-of-these-specifications)
-   [Terms and definitions](#terms-and-definitions)
-   [List of meta-characters](#list-of-meta-characters)
-   [A. Basic concepts](#A)
    -   [A.1. Intention](#A1)
    -   [A.2. Global construction](#A2)
    -   [A.3. MDE file format](#A3)
    -   [A.4. Rules ranking](#A4)
    -   [A.5. Blank lines](#A5)
    -   [A.6. Indentation](#A6)
    -   [A.7. Automatic escaping](#A7)
    -   [A.8. Inline HTML](#A8)
        -   [A.8.a. Use with caution](#A8a)
        -   [A.8.b. Parsing markdown in HTML](#A8b)
        -   [A.8.c. HTML comments](#A8c)
    -   [A.9. Identifiers](#A9)
-   [B. Typographic rules](#B)
    -   [B.1. Application scope](#B1)
    -   [B.2. Emphasis](#B2)
        -   [B.2.a. Emphasis with underscores](#B2a)
        -   [B.2.b. Emphasis with asterisks](#B2b)
        -   [B.2.c. Emphasis auto-escaping](#B2c)
    -   [B.3. Abbreviations](#B3)
    -   [B.4. Code and variable names](#B4)
    -   [B.5. Links](#B5)
        -   [B.5.a. Automatic links](#B5a)
        -   [B.5.b. Raw inline links](#B5b)
        -   [B.5.c. Inline links](#B5c)
        -   [B.5.d. In-page links](#B5d)
        -   [B.5.e. Special links](#B5e)
        -   [B.5.f. Links with attributes](#B5f)
        -   [B.5.g. Referenced links](#B5g)
    -   [B.6. Images](#B6)
        -   [B.6.a. Inline images](#B6a)
        -   [B.6.b. Images with attributes](#B6b)
        -   [B.6.c. Referenced images](#B6c)
    -   [B.7. Footnotes](#B7)
    -   [B.8. Inline mathematics](#B8)
-   [C. Structural rules](#C)
    -   [C.1. Application scope](#C1)
    -   [C.2. Paragraphs](#C2)
    -   [C.3. Line breaks](#C3)
    -   [C.4. Horizontal rules](#C4)
    -   [C.5. Titles](#C5)
        -   [C.5.a. ATX: sharps titles](#C5a)
            - [C.5.a.1. Basics](#C5a1)
            - [C.5.a.2. ATX titles with attributes](#C5a2)
        -   [C.5.b. Setext: underlined titles](#C5b)
            - [C.5.b.1. Basics](#C5b1)
            - [C.5.b.2. Sextet titles with attributes](#C5b2)
    -   [C.6. Pre-formatted texts](#C6)
        -   [C.6.a. Simple notation](#C6a)
        -   [C.6.b. Fenced code blocks](#C6b)
            - [C.6.b.1. Basics](#C6b1)
            - [C.6.b.2. Language information](#C6b2)
            - [C.6.b.3. Fenced code blocks with attributes](#C6b3)
    -   [C.7. Citations](#C7)
        -   [C.7.a. Basics](#C7a)
        -   [C.7.b. Citation original URL](#C7a)
    -   [C.8. Lists](#C8)
        -   [C.8.a. Unordered lists](#C8a)
        -   [C.8.b. Ordered lists](#C8b)
    -   [C.9. Terms definitions](#C9)
    -   [C.10. Tables](#C10)
        -   [C.10.a. Basic table](#C10a)
        -   [C.10.b. Columns alignment](#C10b)
        -   [C.10.c. Cell grouping](#C10c)
        -   [C.10.d. Table caption](#C10d)
        -   [C.10.e. Table with multiple bodies](#C10e)
        -   [C.10.f. Table with attributes](#C10f)
    -   [C.11. Mathematics blocks](#C11)
    -   [C.12. Images blocks](#C12)
-   [D. Miscellaneous rules](#D)
    -   [D.1. Meta data](#D1)
        -   [D.1.a. Basics](#D1a)
        -   [D.1.b. Meta-data value insertion](#D1b)
    -   [D.2. Escaping of meta-characters](#D2)
    -   [D.3. References](#D3)
        -   [D.3.a. Basics](#D3a)
        -   [D.3.b. Various types of references](#D3b)
        -   [D.3.c. Identifiers construction for REFIDs](#D3c)
    -   [D.4. Mathematics](#D4)
    -   [D.5. The special case of notes](#D5)
        -   [D.5.a. Footnotes](#D5a)
        -   [D.5.b. Glossary notes](#D5b)
        -   [D.5.c. Bibliographic notes](#D5c)
    -   [D.6. User defined attributes](#D6)
        -   [D.6.a. Tags attributes](#D6a)
        -   [D.6.b. Raw attributes](#D6b)
    -   [D.7. Identifiers construction for IDs](#D7)
    -   [D.8. Automatic indexations](#D8)
        -   [D.8.a. Table of contents](#D8a)
        -   [D.8.b. Table of figures and tables](#D8b)
    -   [D.9. Implementers specifics](#D9)
        -   [D.9.a. Error handling](#D9a)
        -   [D.9.b. Structural tags](#D9b)
        -   [D.9.c. User configuration](#D9c)
        -   [D.9.d. Various](#D9d)
            -   [D.9.d.1. Other file inclusion](#D9d1)
            -   [D.9.d.2. Critic markup](#D9d2)
-   [Contribute](#contribute)


Introduction {#introduction}
------------

**[Markdown][wiki-markdown]** is originally a plain text formatting syntax created by 
[John Gruber][wiki-john-gruber] and [Aaron Swartz][wiki-aaron-swartz]. It allows to write some contents
with an easy-to-read, easy-to-write set of rules for plain text format then to convert it in a rich format
(basically HTML).

Many developers have proposed their own implementation of the original syntax with specific
evolutions and extensions. The goal of **MDE** is to define an official and homogeneous new
version, as complete and rich as possible, while keeping only the relevant evolutions
or more used rules. **MDE can be considered by developers as the new standard for Markdown,
so that each user does not need to adapt to the current implementation but can use these rules 
everywhere.**


Origins of Markdown Extended {#origins-of-markdown-extended}
----------------------------

The original idea of the Markdown syntax came from [John Gruber][daring-fireball],
who defined its goal, the first Markdown syntax rules and coded a first parser
as a *Perl* script. He also wrote [the first manual of the syntax][markdown-manual].

Working on these specifications, the following implementations inspired us:

-   [**Markdown Extra**][markdown-extra], written by [Michel Fortin][michel-fortin], coded in *PHP* script
-   [**Multi Markdown**][multi-markdown], written by [Fletcher T. Penney][fletcher-penney], coded in *Perl* script
-   [**PHP Markdown Extra Extended**][php-markdown-extra-extended], written by [Egil Hansen][egil-hansen], coded in *PHP* script
-   [**PHP Markdown Extended**][php-markdown-extended], written by [myself][e-piwi], coded in *PHP* script (*this is my implementation
    of Markdown and the reason why I decided to write these specifications*)

We also relied on the great work of [John MacFarlane][john-macfarlane]: [Standard Markdown Spec][standard-markdown-spec].


Scope of these specifications {#scope-of-these-specifications}
-----------------------------

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", 
"RECOMMENDED", "MAY" and "OPTIONAL" in this document are to be interpreted as described in 
[RFC 2119][rfc-2119]. By extension, any word in capital letters SHOULD be understood in its
literal meaning.

The present specifications of the syntax DOES NOT suppose about the final rendering of the 
content. This rendering is the purpose of the *parsers* and specific applications. The "HTML" 
final output CAN be used as a rendering example but MUST NOT be a specification reference.

Each item of the sections below is identified by a structural ID composed like `A.B.C.` 
to allow it to be referenced and used in citations, implementations, documentations etc.
These MUST NOT change for a given release of the specifications.


Terms and definitions {#terms-and-definitions}
---------------------

For the purposes of this document, the following terms and definitions apply:

**MDE** - shortcut for "Markdown Extended"

**span element** - A "span" element is a piece of content that does not concern an entire *block*
; span elements are described in the *typographic rules* of these specifications ([§§](#B)).

**block element** - A "block" element is a piece of content that concerns an entire *block* as
described at [§§](#C1) ; block elements are described in the *structural rules* of these
specifications ([§§](#C)).

**blank line** - A "blank line" in MDE is any line that does not output anything ; this concept
is developed in [§§](#A5).

**meta character** - Any character used in at least one rule of the syntax is considered as a
"meta" character ; they are listed below.

**meta data** - A "meta-data" is a piece of information written in a document (or loaded by
parsers) but not actually rendered in final output ; this concept is developed in [§§](#D1).

**reference** - A "reference" is a mark of any kind that refers to a definition written elsewhere 
in the document (at its bottom for instance) ; this concept is developed in [§§](#D3).

**ID** - This designates an *identifier string* as defined in the HTML language ; it is used in MDE
to identify certain contents with a unique (and constant) string ; this concept is developed in [§§](#D7).

**REFID** - This designates an *identifier string* used to identify each *reference* item ; the *REFID*
follows different construction rules than the classic *ID* ; this concept is developed in [§§](#D3c).

**EOL** - For "end of line" ; in an MDE document, this can be either a "CR" `\r`, "LF" `\n` or 
"CRLF" `\r\n` character depending on the platform.

**indentation** - In MDE like in many other languages, the "indentation" is made by writing
a *tabulation* OR *four spaces* from last indentation limit (originally the left side of the 
document, which is the "indentation zero" limit) ; this concept is developed in [§§](#A6).

**reader** - In these specifications, "reader" designates the "final user", the persons who
read an MDE document.

**writer** - In these specifications, "writer" designates the "syntax user", the persons who
write contents using the MDE syntax.

**parser** - In these specifications, "parser" designates the application in charge to treat
the original MDE content and transform it in a rich language ; the final rendering MUST NOT
be important while reading the specifications.

**implementation** - This designates the same as "parser".

**configuration** - This designates an optional set of options a parser can accept to define
some of its behaviors.

For the purposes of this document, the following notations apply:

**∙** - This character is used when necessary to represent a *space* character.

**->** - This notation is used when necessary to represent a *tabulation* character.

**|** - This character is used when necessary to represent the left side of the document or
the character zero of a line.


List of meta-characters {#list-of-meta-characters}
-----------------------

Below is a list of all meta-characters used for semantic rules in MDE (the word in *italic* 
is the one we will use in this document):

-   `\` : the *backslash*
-   `.` : the *dot*
-   `:` : the *colon*
-   `!` : the *exclamation point*
-   `#` : the *hash mark* or "sharp"
-   `*` : the *asterisk* or "wildcard"
-   `+` : the *plus sign*
-   `-` : the *hyphen* or "dash" or minus sign
-   `_` : the *underscore*
-   `\`` : the *backtick* quote
-   `|` : the *pipe*
-   `(` and `)` : the *parentheses*
-   `[` and `]` : the *brackets*
-   `{` and `}` : the *curly brackets*
-   `<` and `>` : the *angle brackets* or "chevrons"


A. Basic concepts {#A}
----------------------

The sections of this document will explain each tag to use for each writing rule. To begin, as a very
first introduction to the MDE syntax, we MUST ALWAYS keep the following basis in mind:

-   **a Markdown content is written as plain text**: 
    -   it MUST be working by any software reading file (such as `vi`)
    -   it MUST be readable by a human "as-is" (this is the very first goal of Markdown)
-   **a paragraph is created in Markdown passing a blank line** (this rule is developed in [§§](#C2))
-   as Markdown rules are written using some specific characters, **these characters MAY be escaped**
    to be used "as-is" (this is developed in [§§](#D2))
-   **all the rules CAN be used in one single Markdown content** and be parsed correctly
    (any conflict between rules MUST be avoided)
-   for convenience, **the "references" notation MUST be allowed for a maximum of rules**
    (this notation is explained in [§§](#D3)) as it permits to keep a content readable.

For information, developers and webmasters can use the [*Markdown Mark* icon created by Dustin Curtis][markdown-mark]
to identify MDE files and syntax.

### A.1. Intention {#A1}

The MDE rules MUST keep ALL original Markdown's rules valid as described on [daringfireball.net][markdown-manual]
for retro-compatibility.

As said in the *scope of these specifications* ([§§](#scope-of-these-specifications)),
we WILL NOT give rendering rules here. Each parser MAY follow its own final rendering rules
according to the MDE specifications (concerning the original MDE content) and concerned language.
Thus, we MUST keep in mind that the final output MAY NOT be HTML only ; a parser can construct any 
format of output (such as PDF, OpenDocument etc). This is a major difference with the original 
John Gruber's Markdown parser, which only constructs HTML output.

The rules we have tried to impose on us by writing these specifications are:

-   to allow a writer to construct a content as rich as possible, without being so strict
    about notations ; some information MUST be writable after OR before a mark, with OR without
    a space separator etc. to let the writer free to concentrate on the content (more than on
    the rules themselves)
-   to allow a reader to understand quite well the content intentions (the various marks roles)
    and, most important, to be able to read a content without having a big effort to deploy
    to ignore the various syntax's marks.

### A.2. Global construction {#A2}

The master idea of Markdown is the **readability** of the content. Which means: if a reader has a Markdown file
and opens it with a program like `less` or `vi` (or any program that renders a file "as is"), he MUST
be able to read its content with no other action.

This idea basically means two things:

1.  the semantic tags used to finally build a rich content SHOULD NOT prevent a clear reading
    of that content
2.  a reader SHOULD have to only scroll down to continue reading (right/left scroll SHOULD be avoided)

Keeping readability using the semantic tags of the syntax is the purpose of these specifications ;
we will here try to define the best rules to NOT prevent a clear reading but DO allow a maximum
of rich final rendering. Keeping a document "one way scroll only" is simplified by the global
construction of a Markdown content: the real *end of lines* of the content ARE NOT the final
ones. Writers CAN, if they need to, render a final end of line (called "hard break" [§§](#C3)),
but the first thing to keep in mind writing with the Markdown syntax is that you DO NOT NEED
to write your paragraphs chained on a single line. You SHOULD choose a word-wrapping number (a number
of characters a line must not exceed - something like 100 characters in this document) and
pass to next line each time your current one goes to this number.

**Writer Note:** This is generally the case of the common *LICENSE* files: the text of the
license is clearly readable because each line of content does not exceed a short number of
characters.

### A.3. MDE file format {#A3}

An MDE file MUST be considered as a *plain text* document. It is basically a raw plain text file just like
a classic `.txt` file. It MAY be encoded in a "classic" file encoding such as `utf-8` or `iso-...`.

Any MDE file MUST work with any software reading file contents.

**Writer Note:** The best practice is to always use the same extension for MDE files as it permits to identify them
quickly and define some special treatments based on a file extension filtering ; the `.md`, `.mde` or `.markdown`
extensions are given here as examples.

### A.4. Rules ranking and precedence {#A4}

The syntax's rules of these specifications are separated in the following three types based on their utility:

**Typography**
:   Rules concerning the rendering of typographic writing usages, such as bold
    emphasis or links ; this almost concerns a word, a group of words or an expression.
    The "typographic" rules are often called "span elements".
    See [§§](#B).

**Structure**
:   Rules concerning a special rendering of a sentence or a group of sentences,
    such as citations or pre-formatted blocks.
    The "structural" rules are often called "block elements".
    See [§§](#C).

**Miscellaneous**
:   Any rule that can not be classified in the two first categories.
    See [§§](#D).

The first rule to keep in mind is that the *structural* construction MUST be parsed BEFORE
the *typographic* one. In other words, blocks rules have precedence over inline ones.

### A.5. Blank lines {#A5}

A "blank line" in MDE is any line that does not output anything. A line with only spaces 
or tabulations MUST be considered as a blank line.

### A.6. Indentation {#A6}

#### A.6.a. The MDE indentation level {#A6a}

The indentation level in MDE is **1 tabulation** or **four spaces**. When a syntax rule 
embeds characters, these characters are counted to estimate the indentation:

    1 tab = 4 spaces = 1 indentation level
    1 character + 3 spaces = 4 characters = 1 indentation level
    2 characters + 2 spaces = 4 characters = 1 indentation level
    ...

#### A.6.b. Indentation rules {#A6b}

Any block of content that requires an indentation MAY allow any other syntax's rule to be
used in that content, considering the position of the first character of the first indented 
line as the new left side of its own indentation.

The syntax's rules that DOES NOT require an indentation can begin at less than 4 spaces from
last indentation limit. For instance, an ATX title ([§§](#C5a)) can be indented with 3 spaces
if writer feels it would be better (in the example above, the *space* character is represented 
by a `∙`):

    |∙∙∙# title

But if the same title is indented by 4 spaces, it is considered as a code block and not as
a title (in the example above, the *space* character is represented by a `∙`):

    |∙∙∙∙# title

**Implementation Note:** an indentation composed of less than the MDE indentation level is
often called `less_than_a_tab` in parsers implementations. It generally means "*three spaces 
or less*".

Finally, for rules that requires a character AND an indentation, only the first line MUST 
actually be indented, subsequent lines of the same block can either be indented or not. This
is NOT true when the rule does not include a character (like for pre-formatted blocks - [§§](#C6a)).

**Writer Note:** For a document often read "as is" as plain text, it MAY be a good idea to 
always indent a block for readability.

#### A.6.c. Indentation and blank lines {#A6c}

The global rules for blocks sequences are:

-   passing 1 blank line MUST close last indented block (indentation level goes down by 1),
    except if the next block is indented exactly like last one and current block allows paragraphing
    (this is the case of list items for instance - [§§](#C8))
-   passing 2 blank lines MUST close ALL current indented blocks (indentation level goes back to 0),
    except in a *fenced code block* ([§§](#C6b)), where the content MUST be rendered "as is" 
    (the two blank lines must therefore be rendered as two blank lines).

**Example:** A classic example is the case of a code block following a list item. If only one line is
passed between both, the code block will be considered as part of the list item's content (and must
be indented in consequence by 2: 2 tabulations or 8 spaces). If two blank lines are passed, the block 
must be considered as a fresh new block (the list item is considered finished).


### A.7. Automatic escaping {#A7}

As developed by John Gruber in [original Markdown's manual][markdown-manual], and because the
first goal of Markdown was to build HTML rendering, some special characters considered as 
"meta characters" in HTML MAY be automatically escaped to construct a valid HTML output.
Even if we MUST NOT suppose about the final rendering here ([§§](#scope-of-these-specifications)),
we also posed the condition that any original Markdown rule MUST be valid in MDE ([§§](#A1)).
So we MUST keep the original auto-escaping of HTML meta characters.

Outside a code span ([§§](#B4)) or a pre-formatted block ([§§](#C6)), and as long as the character
is NOT part of an MDE tag, the following characters SHOULD be escaped when rendering an HTML output:

-   the *ampersand* `&` SHOULD be rendered as `&amp;`
-   the *left angle* `<` SHOULD be rendered as `&lt;`
-   the *right angle* `>` SHOULD be rendered as `&gt;`

**Implementation Note:** Parsers that rendered a non-HTML output SHOULD introduce the raw 
original character in the final rendering.

### A.8. Inline HTML {#A8}

On the same idea as for *automatic escaping* ([§§](#A7)), inline HTML MUST be authorized
in an MDE content. BUT, a consequence of the fact that the final rendering MAY NOT be
only HTML ([§§](#scope-of-these-specifications)) is that raw HTML tags MAY NOT be rendered
as writer expects in other formats.

#### A.8.a. Use with caution {#A8a}

In conclusion, raw inline HTML MAY be avoided in an MDE content but parsers MUST be prepared
to treat such contents.

**Implementation Note:** Without being a specification rule, we can conclude that parsers
SHOULD be prepared to handle HTML tags for any final output. For any other format than HTML, 
the best practice MAY be to keep the content "as is" skipping any HTML tag (but keeping the 
text content).

#### A.8.b. Parsing markdown in HTML {#A8b}

If a writer really needs to use an HTML notation in an MDE document, he can "ask" to this
content to be parsed adding a `markdown="1"` attribute.

For instance, the content below will be rendered "as is":

    <div>This will be rendered with **raw asterisks**.</div>

While this will rendered as an MDE content (with `strong` tag instead of asterisks):

    <div markdown="1">This will be rendered with **a strong tag**.</div>

#### A.8.c. HTML comments {#A8c}

HTML comments MUST be an exception as this is the best way to include a comment in an MDE
content. All parsers MUST handle HTML comments as *comments* (in any language).

As a reminder, the HTML comment tag is constructed surrounded between `<!--` and `-->` and
can be multi-line:

    <!-- Comment content -->

**Implementation Note:** The final result of a comment is not really defined as it MAY depend
on the rendering format. By default, the best practice SHOULD be to skip comments from final
output as a comment may have been written just for not-visible information. Parsers rendering
an HTML format CAN keep comments "as is" (present in the output) as they won't be displayed.

### A.9. Identifiers {#A9}

An MDE parser MUST be able to reference some specific contents with identifiers (the *ID* as 
described at [§§](#terms-and-definitions)). Each ID must be unique for the document and SHOULD 
be constant to let readers retrieve a section with permanent links. The ID construction process 
is described in a dedicated section [§§](#D7).

Basically, three types of contents MUST ALWAYS have an *ID*:

-   the *titles* ([§§](#C5))
-   the *tables* ([§§](#C10))
-   the *figures* ([§§](#C12))

In some cases, the ID CAN be defined by the writer to be sure it will be constructed like he
expects. Please see dedicated section [§§](#D6).


B. Typographic rules {#B}
-------------------------

A rule is considered as *typographic* when it only concerns one or more words written inline
in a text. As long as it does not concern a full block of text, a rule MUST be considered as 
*typographic*.

### B.1. Application scope {#B1}

A typographic rule MUST begin and end in the same block of text. It CAN begin at the beginning of
the block and end at its end, but it MUST NOT concern more than one block.

The example below is valid:

    *A first block of content.*
    
    *Another* one ...

While the notation below is NOT valid:

    *A first block of content.
    
    Another* one ...


### B.2. Emphasis {#B2}

Bold and italic text emphasis MUST keep simple to use and read. The first idea was kept about
these effects allowing two different typefaces: the *underscore* `_` and the *asterisk* `*`.

#### B.2.a. Emphasis with underscores {#B2a}

Italic text is written surrounded by one character (1 *underscore* `_` on the left and 
1 *underscore* `_` on the right without space):

    _italic_

Bold text is written surrounded by two characters (2 *underscores* `__` on the left and 
2 *underscores* `__` on the right without space):

    __bold__

#### B.2.b. Emphasis with asterisks {#B2b}

Italic text is written surrounded by one character (1 *asterisk* `*` on the left and 
1 *asterisk* `*` on the right without space):

    *italic*

Bold text is written surrounded by two characters (2 *asterisks* `**` on the left and 
2 *asterisks* `**` on the right without space):

    **bold**

**Writer Note:** For a document often read "as is" as plain text, the asterisk notation MAY be used
preferably as it seems to let the reader understand word's importance.

#### B.2.c. Emphasis auto-escaping {#B2c}

In-words underscores MAY NOT be considered as emphasis delimiters ; for instance, 
writing `my_underscored_words`, the `underscored` word MAY NOT be in italic but the whole
expression MAY be kept "as-is". In other words, writing `__my_underscored_words__` MAY be
rendered as the expression `my_underscored_words` written in bold text (*leading and trailing
characters are considered as emphasis delimiters but internal characters are auto-escaped*).

This rule is important in a case like `underscored_words followed by other_underscores`
as it seems easier to let a parser match the two distant underscores as delimiters while this
MAY NOT be the case (*underscores may be kept "as-is" in both expressions*).

**Implementation Note:** As concluded by Fletcher Penney in his work on MultiMarkdown, the
original reason of this auto-escaping is that "*[underscores] caused too many problems with URL's*".
Effectively, URLs often use underscores as a word separator and these ones MUST NOT be considered
as typographic delimiters.

This rule only concerns *underscores*. If a writer wants to emphase just a part of a word,
he can do so using the *asterisks* notation.

### B.3. Abbreviations {#B3}

An abbreviation is written like a *reference* ([§§](#D3)) with a leading *asterisk* `*`:

-   the abbreviation term at the beginning of the line between *brackets* `[` and `]` and with:
    -   a leading *asterisk* `*` (without space)
    -   a trailing *colon* `:` (without space)
-   then the full text of the abbreviation after a space

~~~
*[HTML]: Hyper Text Markup Language
~~~

The result SHOULD be informing about the full meaning of the term any time this whole term
is found in the content as a whole word.

**Example:** In the example above (the "HTML" term), in an HTML rendering, the result SHOULD
be an `abbr` tag each time the "HTML" string is found in the content as a full word. Thus, 
this MUST NOT concern a string like "HTMLize" as it is not strictly "HTML".


### B.4. Code and variable names {#B4}

Inline code and variables MUST keep simple to use and read. The first idea was kept about
this span: surround the code or variable name between *backticks* `\``. A code span MUST 
allow spaces inside.

    This variable `$var` can be accessed using the `-> get(...)` method

Any character of a code span MUST be rendered "as is" in the final output, as the raw 
litteral written character.

**Implementation Notes:** In an HTML output rendering, any character must be transformed to
its HTML entity equivalent (for instance, the left angle `<` must be rendered as `&lt;`) to
be finally rendered by the browser as what was written.

### B.5. Links {#B5}

A *link* concerns any kind of *hypertext link*: a full URL, an in-page link (a hash tag referencing
a section of current document) and any other kind of "clickable" span in an HTML content,
such as an email address, a phone number etc.

**Implementation Note:** A link MUST be rendered clickable for all output formats when it is
possible. When it is not, the address of the link MUST be written in the output to let reader
follow it if he wants.  
For instance, a PDF rendering MUST embed clickable links, but an OpenDocument, which can not
embed clickable interactions, MUST render a link with the original address visible.

#### B.5.a. Automatic links {#B5a}

Standalone URLs MUST NOT be automatically transformed in links if they are not written following one 
of the rules below ([§§](#B5b), [§§](#B5c) and [§§](#B5d)). An URL written inline in a content with 
no specific "link" tag is not a link, it is just a raw URL (in an HTML content, it MAY NOT be clickable).

#### B.5.b. Raw inline links {#B5b}

Making an URL (or any kind of text) clickable can be done by surrounding it between *angle brackets* `<` and `>`:

    <http://link.com/query>

Any text written like that MUST be rendered clickable (with a special treatment if required,
such as email addresses links - see [§§](#B5e)).

#### B.5.c. Inline links {#B5c}

Links can be written *inline* in the text, separated in two parts:

-   the link text between *brackets* `[` and `]`
-   then, between *parenthesis* `(` and `)`, the URL of the link (relative or absolute) and 
    an OPTIONAL title wrapped in *double-quotes* `"` followed by an OPTIONAL list of attributes ([§§](#D6)).

~~~
[a simple link](http://test.com/)

[a link with a title](http://test.com/ "My optional title")

[a link with a title and some attributes](http://test.com/ "My optional title" attribute1=value attribute2=value)
~~~

#### B.5.d. In-page links {#B5d}

In-page anchors can be accessed using the notation of inline links ([§§](#B5b)) replacing the URL by the section hash:

    [my section](#section-id)

See the dedicated section [§§](#D7) to learn how to define the hash reference of a part.

#### B.5.e. Special links {#B5e}

Some special treatments MAY be applied to special links such as email addresses. As these kinds
of links can evolve, there is no list of them here.

**Implementation Note:** For instance, in an HTML rendering, an email address should be transformed 
as a `mailto:...` link.

#### B.5.f. Links with attributes {#B5f}

Links MUST allow *user defined attributes* ([§§](#D6a)):

    [a simple link](http://test.com/){#link-id .link-class}

    [a link with a title](http://test.com/ "My optional title"){#link-id .link-class}

    [a link with a title and some attributes](http://test.com/ "My optional title" attribute1=value attribute2=value){#link-id .link-class}

Note that there MUST NOT be a space between the closing *parenthesis* `)` of the link definition
and the opening *curly bracket* `{` of the user defined attributes.

#### B.5.g. Referenced links {#B5g}

Links MUST allow the *references* ([§§](#D3)) notation:

    This is a paragraph with a [referenced link][linkid] ...
    
    [linkid]: http://test.com/ "My optional title"

This notation can be simplified if the *REFID* (as described at [§§](#terms-and-definitions)) 
is the exact same string as the link text:

    This is a paragraph with a link to [Test.com][] ...
    
    [Test.com]: http://test.com/ "My optional title"

Referenced links MUST allow *user defined attributes* ([§§](#D6a)):

    [Test.com]: http://test.com/ "My optional title" {#link-id .link-class}
    
As the reference definition MUST be written alone on a line, optional *spaces* CAN separate
the reference's content and the attributes definition.

### B.6. Images {#B6}

Basically, images follow the same notation as for *links* ([§§](#B5)) with a leading exclamation point.

#### B.6.a. Inline images {#B6a}

Images can be written *inline* in the text, separated in two parts:

-   the image alternated text between *brackets* `[` and `]` preceded by an *exclamation point* `!`
-   then, between *parenthesis* `(` and `)`, the URL of the image (relative or absolute) and an 
    OPTIONAL title wrapped in *double-quotes* `"` followed by an OPTIONAL list of attributes ([§§](#D6)).

~~~
![alt text](http://test.com/data1/images/1.jpg)

![alt text](http://test.com/data1/images/1.jpg "My optional title")

![alt text](http://test.com/data1/images/1.jpg "My optional title" class=myimageclass style="width: 40px;")
~~~

#### B.6.b. Images with attributes {#B6b}

Links MUST allow *user defined attributes* ([§§](#D6a)):

    ![alt text](http://test.com/data1/images/1.jpg){#image-id .image-class}

    ![alt text](http://test.com/data1/images/1.jpg "My optional title"){#image-id .image-class}

    ![alt text](http://test.com/data1/images/1.jpg "My optional title" class=myimageclass style="width: 40px;"){#image-id .image-class}

Note that there MUST NOT be a space between the closing *parenthesis* `)` of the link definition
and the opening *curly bracket* `{` of the user defined attributes.

#### B.6.c. Referenced images {#B6c}

Images MUST allow the *references* ([§§](#D3)) notation:

    This is a paragraph with an embedded image ![referenced image][imageid] ...
    
    [imageid]: http://test.com/data1/images/1.jpg "My optional title"

Just like for *links* ([§§](#B5g)), the image reference notation can be simplified if the
*REFID* (as described at [§§](#terms-and-definitions)) is the exact same string as the 
"alternate" text:

    This is a paragraph with an embedded image ![image 1][] ...
    
    [image 1]: http://test.com/data1/images/1.jpg "My optional title"

Referenced images MUST allow *user defined attributes* ([§§](#D6a)):

    [image 1]: http://test.com/data1/images/1.jpg "My optional title" {#image-id .image-class}
    
As the reference definition MUST be written alone on a line, optional *spaces* CAN separate
the reference's content and the attributes definition.

### B.7. Footnotes {#B7}

Footnotes may be considered as a "special case" as we MAY allow writers to distinguish
simple footnotes from glossary and bibliographic notes. The construction rules of these three
types MUST follow the same idea, with a special construction for glossary and bibliographic
notes, which can be considered as special footnotes. Please refer to the dedicated 
section about notes [§§](#D5).

### B.8. Inline mathematics {#B8}

Inline mathematics is written by surrounding the content between *escaped parenthesis* `\(` and `\)`:

    \(...\)
    \(\alpha = (t_1 - t_0)/L\)

Mathematics notation is developed in a dedicated section [§§](#D4).


C. Structural rules {#C}
------------------------

A rule is considered as *structural* when it concerns a whole block of content.


### C.1. Application scope {#C1}

A "block" of content is separated from others by:

-   the top or bottom sides of the document
-   a blank line ([§§](#A5))

So the rule here is that for any block of content that CAN be written on multiple-lines, 
it MUST be written with blank lines before AND after. Basically, this is not the case for
"ATX" titles ([§§](#C5a)) and horizontal rules ([§§](#C4)).

**Note:** This MAY increase readability of the content as it will separate each block clearly.

Any block of content MUST allow any other syntax's rule to be used and interpreted. This can
create some nested indentations as described at [§§](#A6).

### C.2. Paragraphs {#C2}

To build a paragraph, just surround it between *blank lines* (at least one before and one after - [§§](#A5)).

    Paragraph 1 ...
    
    Paragraph 2 ...

### C.3. Line breaks {#C3}

To insert a line break, write two or more *spaces* at the end of the line and pass to next line.

    Line 1 ...  
    Line 2 ...

Note that hard breaks are only allowed on a line with a content. A line with only spaces (even
2 or more) MUST NOT be considered as a hard break but as a blank line ([§§](#A5)).

### C.4. Horizontal rules {#C4}

To insert an horizontal rule, write at least three *hyphens* `-`, *asterisks* `*` or *underscores* `_` 
alone on a line (spaces MUST not care):

    ***
    ----
    _ _ _

**Note:** Even if "spaces must not care" in the horizontal rules notations above, writers CAN NOT
begin a line with more than 3 *spaces* as it will be considered as a code block and so not parsed
as an horizontal rule.

### C.5. Titles {#C5}

Titles are built using two notations: "ATX" and "Sextet". The HTML `h` tag have a limit
of 6 levels (`h1` to `h6`) but an MDE parser MUST ignore this limit and be prepared for any
depth levels as writer requires in a document.

**Implementation Note:** In an HTML output rendering, when the title level is up to 6, a parser
SHOULD write the title's content in a way that it shows this is a title (in the document structure)
but without using the `h` HTML tag.

A title MUST be written on a single line, except the underlining line of the "Sextet" notation ([§§](#C5b)).

Any title content MUST be rendered skipping any leading or trailing *spaces*. This allows writers
to add as many *space(s)* as they require around a title content.

The titles list of a document MAY be accessible to build a "table of contents" quickly.
This is developed at [§§](#D8a).

#### C.5.a. ATX: sharps titles {#C5a}

##### C.5.a.1. Basics {#C5a1}

An "ATX" title is written alone on a single line, preceded by as many *hash marks* `#` as 
the title level and a mandatory *space* separator:

    # Title level 1 (HTML tag `h1`)

    ### Title level 3 (HTML tag `h3`)

The mandatory space between the *hash mark* and the title's content allows to differentiate
a title from the notation below (a commit number at the beginning of a line for instance):

    #123456 a text

As the number of trailing and leading spaces MUST NOT matter ([§§](#C5)), the rule can be written like:

-   an "ATX" title MUST have one or more *space(s)* separator between the *hash mark* and
    the title text.

OPTIONALLY, ATX titles can be "closed" using a random number of *hash marks* at the end of the line:

    ### Title level 3 (HTML tag `h3`) ##

**Implementation Note:** The "ATX" structure is taken from [the ATX markup][atx-markup].

##### C.5.a.2. ATX titles with attributes {#C5a2}

ATX titles MUST allow *user defined attributes* ([§§](#D6a)):

    # Title level 1 (HTML tag `h1`) {#title-id .title-class}
    ### Title level 3 (HTML tag `h3`) ## {#title-id .title-class}
    ##### Title level 5 (HTML tag `h5`) {#title-id .title-class}#####

As a title MUST be alone on a line, the attributes DOES NOT NEED to be unspaced from the text.
The rule here is that any string wrapped between *curly brackets* `{` and `}` MUST be considered
as attributes (which means before OR after the final optional hash marks).

#### C.5.b. Setext: underlined titles {#C5b}

##### C.5.b.1. Basics {#C5b1}

The "dash" notation only concerns the two first levels of titles in a document. They are written
underlined by *equal signs* `=` for the first level and *hyphens* `-` for the second:

    Title level 1 (HTML tag `h1`)
    =============================

    Title level 2 (HTML tag `h2`)
    -----------------------------

The underlining line MUST NOT require to be as long as the title text, any number of
equals or hyphens MUST work.

    Title level 1 (HTML tag `h1`)
    =

    Title level 2 (HTML tag `h2`)
    -

**Writer Note:** If you know that a document will often be read "as-is" as plain text, the Setext notation
MAY be chosen preferably to the ATX one as it seems more comprehensive.

**Implementation Note:** The "sextet" structure is taken from [the Setext markup][setext-markup].

##### C.5.b.2. Sextet titles with attributes {#C5b2}

Sextet titles MUST allow *user defined attributes* ([§§](#D6a)):

    Title level 1 (HTML tag `h1`) {#title-id .title-class}
    ======================================================

    Title level 2 (HTML tag `h2`) {#title-id .title-class}
    -

As a title MUST be alone on a line, the attributes DOES NOT NEED to be unspaced from the text.

### C.6. Pre-formatted texts {#C6}

In MDE (like in the original Markdown syntax) a "pre-formatted content" is considered as
a "pre-formatted code block", which means that, in an HTML output, the result SHOULD be
a `<pre><code> ... </code></pre>` tag rather than a simple `<pre> ... </pre>`.

**Implementation Note:** For more information, please read the following HTML5 specifications:
-   [specification of the `code` element](w3c-html5-code-specifications)
-   [specification of the `pre` element](w3c-html5-pre-specifications)

#### C.6.a. Simple notation {#C6a}

A pre-formatted block is written as a paragraph beginning lines with 4 *spaces* (*the pipe 
of the example below is not included in the notation and represents line's 1st character*):

    |∙∙∙∙a pre formed content

Unlike indentation rules for blocks ([§§](#A6)), ALL lines of a pre-formatted block 
MUST be indented as this is the only rule to identify that kind of content.

Following the *indentation and blank lines* rules ([§§](#A6c)), passing two blank lines or more
between two code blocks MUST finally render two separated code blocks.

**Implementation Note:** This means that, in an HTML output, the following MDE content:

    |    a pre formed content
    |
    |
    |    another pre formed content

MUST be rendered as:

    <pre>a pre formed content</pre>
    <pre>another pre formed content</pre>

Any character of a pre-formatted code block MUST be rendered "as is" in the final output, 
as the raw litteral written character.

**Implementation Notes:** In an HTML output rendering, any character must be transformed to
its HTML entity equivalent (for instance, the left angle `<` must be rendered as `&lt;`) to
be finally rendered by the browser as what was written.

#### C.6.b. Fenced code blocks {#C6b}

##### C.6.b.1. Basics {#C6b1}

A "fenced" code block can be written surrounded a content between two lines of *tildes* `~` 
or *backticks* `\`` (at least 3):

    ~~~
    My code here
    ~~~

**Implementation Note:** The rendering of such content MUST be the exact same as for "classic"
pre-formatted content ([§§](#C6)).

Like specified in the *indentation and blank lines* rules ([§§](#A6c)), passing two blank lines
or more inside a fenced code block MUST NOT be considered as blocks separator but as raw blank lines.

**Implementation Note:** This means that, in an HTML output, the following MDE content:

    ~~~
    a pre formed content


    another pre formed content
    ~~~

MUST be rendered as:

    <pre>a pre formed content
    
    
    another pre formed content</pre>

Any character of a fenced code block MUST be rendered "as is" in the final output, as the raw 
litteral written character.

**Implementation Notes:** In an HTML output rendering, any character must be transformed to
its HTML entity equivalent (for instance, the left angle `<` must be rendered as `&lt;`) to
be finally rendered by the browser as what was written.

##### C.6.b.2. Language information {#C6b2}

An information about the language used in the block can be defined following the first delimiter by the 
language name (without space):

    ```html
    My HTML code here
    ```

**Implementation Note:** In an HTML implementation, this feature permits to create a *language friendly* code block, 
as recommended by the W3C in the [HTML5 `code` element specification][w3c-html5-code-specifications].

##### C.6.b.3. Fenced code blocks with attributes {#C6b3}

Fenced code blocks MUST allow *user defined attributes* ([§§](#D6a)):

    ~~~{#block-id .block-class}
    My code here
    ~~~
    
    ~~~html{#block-id .block-class}
    My code here
    ~~~

When a language information si defined on the first line of *tildes* or *backticks*, the attributes
definition MUST be written last (after the language information) and without space.


### C.7. Citations {#C7}

#### C.7.a. Basics {#C7a}

A blockquoted block is written preceding each line or only the first one of a paragraph by a *right angle bracket* `>`:

    > This is my blockquote,
    > where we can include **other Markdown** tags ...

    > We can also write our blockquotes
    without the superior sign on each line, but just at the beginning of the first one.

Once a blockquote has begin (*e.g. as long as no blank line is passed*), the content MUST be part of it.

Nested blockquotes can be written with consecutive left angle signs rather than indenting
each one:

    > This is my blockquote
    > > This is a nested blockquote

MUST be the same as:

    > This is my blockquote
    >> This is a nested blockquote

**Writer Note:** The notation of blockquotes is the "classic" *email-style* for citations, this
is the reason why the indentation between the angle bracket and the content is NOT required.

#### C.7.b. Citation original URL {#C7a}

To precise the URL of the original content cited, write this URL at the beginning of the first line
between *parenthesis* `(` and `)`:

    > (http://test.com/) This is my blockquote,
    > with a content cited from the original "http://test.com" page ...


### C.8. Lists {#C8}

A list is made by writing a character (for unordered one) or a number (for ordered one) at
the beginning of a line and then writing the content after 1 level of indentation. This means
that at least 3 *spaces* MUST be present after that character:

    1 character + 3 spaces = 4 characters = 1 indentation level

As described at [§§](#A6), the indentation is only required for the first line of a list item:

    -   a list item
        on two lines

MUST be the same as:

    -   a list item
    on two lines

Following the indentation level idea, a sub-item is created by adding 1 level of indentation
to the last one. It means that, for a list sub-item, the character (originally written at the
beginning of the line) MUST be written after 1 level of indentation that represents its
parent list item, and then the rule of indentation applies again:

    -∙∙∙a parent list item (first level of indentation)
    ∙∙∙∙-∙∙∙a sub-item in that parent (second level of indentation)
    -∙∙∙continuation of the original list items

#### C.8.a. Unordered lists {#C8a}

An un-ordered list is written beginning each entry by an *asterisk* `*`, a *plus sign* `+` or an 
*hyphen* `-` followed by 1 or more *space(s)*. The character used for each item of a list MUST NOT matter:

    -   first item
    *   second item
    -   third item

To create sub-items, just indent the sub-list twice:

    -   first item
    *   second item
        - first sub-item
        * second sub-item
    -   third item

#### C.8.b. Ordered lists {#C8b}

An ordered list is written beginning each entry by a number followed by a *period* `.` and 
1 or more *space(s)*. The number used for each item of a list MUST NOT matter:

    1.   first item
    1.   second item
        1.  first sub-item
        1.  second sub-item
    2.   third item

**Writer Note:** A special attention MAY be attached when beginning a line with a raw hyphen, asterisk or plus or
with a number followed by a point. For instance, to write the raw string `123. My text`, the
point after the number MUST be escaped to not be parsed as an ordered list item:

    123\. My text


### C.9. Terms definitions {#C9}

A definition is written separated in at least two parts:

-   the term on the first line, with no leading space or character
-   then, the definition beginning on the second line, with a leading *colon* `:` followed by 
    at least 3 *spaces* (1 level of indentation)

~~~
Apple
:   Pomaceous fruit of plants of the genus Malus in
    the family Rosaceae.
~~~

A term can have multiple definitions, separated by a *blank line* ([§§](#A5)):

    Apple
    :   Pomaceous fruit of plants of the genus Malus in
        the family Rosaceae.

    :   Lorem ipsum.

Each definition can have multiple paragraphs:

    Apple
    :   Pomaceous fruit of plants of the genus Malus in
        the family Rosaceae.

        Lorem ipsum.


### C.10. Tables {#C10}

#### C.10.a. Basic table {#C10a}

The basic table syntax is as simple as trying to build a visual table in plain text:

    | First Header  | Second Header    |
    | ------------- | ---------------- |
    | Content Cell  | Content *Cell*   |
    | Content Cell  | Content **Cell** |

The rules here are:

-   every table's line is written alone on a single line
-   the first lines are the headers of the table (most of the time one single line)
-   it is followed by a mandatory separator line of *hyphens* `-`
-   each line below is a line of the table content
-   columns are separated by *pipes* `|` and each line may have the same number of pipes
-   spacing is not important except for visual facility
-   tables can be written without the leading pipes

Finally, the content of the cells can have other MDE's typographic features like emphasis ([§§](#B2)).

#### C.10.b. Columns alignment {#C10b}

Alignment in columns can be specified by using *colons* `:` in the separators line:

-   a colon on the left of a separator's cell means a *left-aligned column*: `:---`
-   a colon on the right of a separator's cell means a *right-aligned column*: `---:`
-   two colons on the left and the right of a separator's cell means a *centered column*: `:--:`

~~~
| First Header  | Second Header | Third header |
| ------------- | ------------: | :----------: |
| Content Cell  | **Cell**      | **Cell**     |
| Content Cell  | **Cell**      | **Cell**     |
~~~

#### C.10.c. Cell grouping {#C10c}

To build cell groups (one cell over more than one column) we write as many final pipes as the content 
must cover columns, without spaces:

    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |

**Implementation Note:** Cell grouping MUST be allowed in lines of content AND header line(s).

#### C.10.d. Table caption {#C10d}

Table caption is written between *brackets* `[` and `]` just before or just after the table, 
on a new single line:

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    [ my table caption ]

A table *ID* (as described at [§§](#terms-and-definitions)) can also be defined. Please 
refer to the dedicated section about attributes [§§](#D6).

#### C.10.e. Table with multiple bodies {#C10e}

Separate sets of content for a single table are written separating them with one *blank line* ([§§](#A5)):

    |               | Grouping                    ||
    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    
    | New section   |   More        |         Data |
    | And more      |           And more          ||

**Implementation Note:** In HTML, the result should be a table with two `tbody` sections.

#### C.10.f. Table with attributes {#C10f}

Fenced code blocks MUST allow *user defined attributes* ([§§](#D6a)):

    | First Header  | Second Header | Third header |
    | ------------- | ------------: | :----------: |
    | Content Cell  |  *Long Cell*                ||
    | Content Cell  | **Cell**      | **Cell**     |
    [ my table caption ] {#table-id .table-class}

For a table with no caption, the attributes definition is written on a single line just before
or after the table (without any blank line).

For a table with a caption line, the attributes definition MUST be written on the same line
as the caption. As each of these information are wrapped in different chains, the order or 
spaces MUST NOT matter.

### C.11. Mathematics blocks {#C11}

Block of mathematics formula is written surrounding the content between *escaped brackets* `\[` and `\]`
(additionally to blank lines):

    \[...\]
    \[\Delta = \frac{\partial U^*}{\partial F} = \frac{12F}{Eb} \int_0^L \frac{x^2}{(t_0 + \alpha x)^3} dx\]

Mathematics notation is developed in a dedicated section [§§](#D4).

### C.12. Images blocks {#C12}

Following the same notation as for *inline images* ([§§](#B6a)), an image CAN be written
as a single block alone on a line:

    A paragraph ...

    ![alt text](http://test.com/data1/images/1.jpg "My optional title" class=myimageclass style="width: 40px;")

    Another paragraph ...

This notation MUST be used to build the *table of figures and tables* ([§§](#D8b)).

**Implementation Note:** In an HTML rendering, a block image MAY be rendered as a `figure`
tag, as recommended by the W3C in the [HTML5 specifications][w3c-html5-code-specifications].


D. Miscellaneous rules {#D}
---------------------------

### D.1. Meta data {#D1}

#### D.1.a. Basics {#D1a}

Meta-data can be added to an MDE document when necessary ; it can be the case to specify
a special title for the document, its author or any kind of "meta" information.

A meta-data is added writing it at the very top of the document (without any blank line from
the top) as a `var: val` pair:

-   the meta-data name is written at the beginning of the line, followed by a *colon* `:` and a *space*
-   the meta-data content can be multi-line

~~~
author: John Doe
~~~

The name of a meta-data MUST be a kind of "slug": a single string without space which can be 
considered as an identifier.

Multiple meta-data can be written, beginning each item on a new line, and the "true" content
of the document MUST begin after passing at least one blank line after meta-data.

#### D.1.b. Meta-data value insertion {#D1b}

Meta-data can also be used to define variables values available in the document. To use a
meta-data value, use notation `[%var]`: the meta-data name preceded by a *percent sign* `%` 
between brackets `[` and `]`.

    mymeta: A value for the meta-data

    This is the document content, where I can call [%mymeta] value.


### D.2. Escaping of meta-characters {#D2}

Escaping a meta-character in MDE only consists in preceding it by a *back-slash* `\`.

The following characters MUST be escaped to be rendered as the raw character they are:

-   `\\` : the backslash itself
-   `\.` : the dot
-   `\:` : the colon
-   `\!` : the exclamation point
-   `\#` : the hash mark
-   `\*` : the asterisk
-   `\+` : the plus sign
-   `\-` : the hyphen
-   `\_` : the underscore
-   `\`` : the backtick quote
-   `\|` : the pipe
-   `\(` and `\)` : the parentheses
-   `\[` and `\]` : the brackets
-   `\{` and `\}` : the curly brackets

BUT, as certain tags MUST be written using such notation (this is the case of mathematical 
notations for instance, [§§](#B8) and [§§](#C11)), they SHOULD be escaped twice if they are
used in couples (one opening and one closing character):

-   `\\(` and `\\)` : the parentheses
-   `\\[` and `\\]` : the brackets

### D.3. References {#D3}

The idea of the "references" comes from the first idea of Markdown: let the content be readable "as is".

So, in some cases, it is most relevant to move an information on a single line anywhere in the
document (at its bottom for instance) and only insert its *REFID* (as described at 
[§§](#terms-and-definitions)) at its final place.

#### D.3.a. Basics {#D3a}

The global construction of references is to replace the content by a *REFID* and write that
content on another line anywhere.

The *REFID* is written between *brackets* `[` and `]` in the content. The reference is written
on a single line, anywhere in the document (it MUST be skipped from final rendering), with:

-   the *REFID* at the beginning of the line between *brackets* `[` and `]`
-   a *colon* `:` without space after closing bracket
-   then the value of the reference after a *space*

~~~
This is a paragraph with a [referenced link][linkid] ...

...

[linkid]: http://test.com/ "My optional title"
~~~

In the case above, the final rendering MUST be exactly the same as if it was written like:

    This is a paragraph with a [referenced link](http://test.com/ "My optional title") ...
    
    ...


#### D.3.b. Various types of references {#D3b}

As developed in other sections of these specifications, the "reference" notation is used for
different MDE's rules, following different constructions:

1.  the classic reference as described in [§§](#D3a), which can be used for links and images:

        [id]: http://test.com/ "Optional title"

2.  the abbreviation reference as described in [§§](#B3):

        *[TERM]: Content of the abbreviated acronym.

3.  the footnote reference as described in [§§](#D5a):

        [^id]: Content of the footnote.

4.  the glossary note reference as described in [§§](#D5b):

        [^myid]: glossary: Term
        Actual content of the glossary footnote.

5.  the citation note reference as described in [§§](#D5c):

        [#Doe:1991]: FirstName LastName (October 5, 1991). *Title of the work*.

#### D.3.c. Identifiers construction for REFIDs {#D3c}

As described at [§§](#terms-and-definitions), we have to differentiate the *ID* ([§§](#D7))
and the *REFID*, the *references identifier*, which does not have the same usage as classic *ID*
and may not follow the same construction rules. The *REFID* is the string written at the beginning
of the line, between *brackets* `[` and `]`, in the notations listed above ([§§](#D3b)).

A *reference identifier* MUST be constructed, by default, as:

-   a string with or without space
-   with NO meta-caracter ([§§](#terms-and-definitions)) except when it is part of the identifier
    rule (see the list above for examples - [§§](#D3b)).

### D.4. Mathematics {#D4}

One of the goal of MDE (and globally the Markdown syntax) is to write documentation. In this
idea, MDE parsers MUST be prepared to handle complex mathematical notations.

Inline ([§§](#B8)) and block ([§§](#C11)) mathematical contents (the part inside both wrappers) 
MUST follow the [LaTeX syntax][latex-maths-doc].

**Implementation Note:** The final rendering of the mathematical notations can be the scope of 
a third-party application but an MDE parser MUST integrate such third-party natively.


### D.5. The special case of notes {#D5}

Footnotes in a text are a way to increase its meaning, external references, some required
definitions for the global comprehension, without overcrowding it. They are often used in
books and official contents.

We can distinguish three types of footnotes in a content, depending on their intention:

-   **a simple footnote** is a short additional content that would have no place in the content,
-   **a glossary note** is an explanation about a technical term or a glossary entry,
-   **a bibliographic note**, which refers to another book or work, is a hard reference to let the
    reader find the original source.

Any footnote MUST be callable multiple times in a single documents using the same note *REFID*, without
creating a new footnote entry at each call.

**Implementation Note:** Parsers MAY allow, in any output format, to let reader access to a footnote
text where it appears in the document content. If the footnote text is written elsewhere (at the
document bottom for instance), a link MAY be proposed to go back in the content.

#### D.5.a. Footnotes {#D5a}

To create a *footnote* reference, just write its *REFID* like `[^ID]`: a *circumflex* `^` before the *REFID* string,
between *brackets* `[` and `]` in the content, then write the footnote content as a *reference* ([§§](#D3)):

    Paragraph with a footnote[^myid].

    ...

    [^myid]: Content of the footnote.

A footnote can also be written inline like:

    Paragraph with a footnote[^Content of the footnote.].

#### D.5.b. Glossary notes {#D5b}

A glossary note is most like a definition. It is attached to a specific term and tries to give
one or more explanation(s) of it. Glossary notes have to be considered as *definitions list*,
except that they will all be placed like footnotes (at the end of the content for instance).

A *glossary footnote* is written like a classic *footnote* but the first line of the note content
contains concerned term, preceded by the string `glossary: ` and OPTIONALLY followed by a *character*
between *parenthesis* `(` and `)` that will be used to sort the term in an alphabetical lexicon:

    Paragraph with a glossary note[^myid].

    ...

    [^myid]: glossary: Term (x)
    Actual content of the glossary footnote.

The differentiation between classic and glossary footnotes allows to build a *lexicon* of a
document referencing only glossary notes ([§§](#D9b)).

#### D.5.c. Bibliographic notes {#D5c}

A bibliographic note is a fully referenced external work. This kind of notes is often used
in academic or scientific works. The point is that we have to follow some *academic rules*
for bibliographic notes, basically to cite enough information to let the reader find concerned
work easily.

A *citation note* is written like a classic footnote but:

-   the *REFID* of the note is constructed in two parts like `[p. XX][#Doe:1991]`:
    -   the page number between *brackets* `[` and `]` (this content of this part is OPTIONAL)
    -   the reference *REFID*, constructed like classic footnotes ([§§](#D5a)) but preceded by a *hash mark* `#`
-   the note content follows the same rules as for classic footnotes, but the *circumflex*
    is replaced by a *hash mark* `#`.

~~~
Paragraph with a citation note[p. XX][#Doe:1991].

...

[#Doe:1991]: FirstName LastName (October 5, 1991). *Title of the work*.
edition for instance ... (Web link) Retrieved September 30, 2011.
~~~

In a case where the page number is unknown (or not relevant) writer MUST write the first *brackets*
`[` and `]` with an empty content:

    Paragraph with a citation note[][#Doe:1991].

    ...

    [#Doe:1991]: FirstName LastName (October 5, 1991). *Title of the work*.
    edition for instance ... (Web link) Retrieved September 30, 2011.

In a case where writers need to reference a citation without using it in the content, the `[not cited]`
prefix MUST be used and MUST be case insensitive:

    Paragraph with no citation note.

    ...

    [Not Cited][#Doe:1991]: FirstName LastName (October 5, 1991). *Title of the work*.
    edition for instance ... (Web link) Retrieved September 30, 2011.

**Implementation Note:** Parsers MAY have to follow some typographic *academic rules* for bibliographic
notes, such as naming the authors in bold, writing the title of the work in italic etc.

The differentiation between classic and citation footnotes allows to build a *bibliographic index* of a
document referencing only citation notes ([§§](#D9b)).

### D.6. User defined attributes {#D6}

#### D.6.a. Tags attributes {#D6a}

A special notation allows writers to define some specific attributes, taken from the HTML 
markup language: some **class names** and some **identifiers**.

Writers can use the following notation, placing it near concerned content:

    {#id}
    {.class-name}
    {.class-name #id}
    {#id .class-name1 .class-name2}

This notation can be decomposed in:

-   one or zero *ID* string preceded by a *hash mark* `#` (without space)
-   zero, one or more class names preceded by a *period* `.` (without space)
-   each attribute separated from others by a *space*
-   the whole string surrounded between *curly brackets* `{` and `}`

The order of class names and ID MUST not matter:

    {#id .class-name1 .class-name2}
    {.class-name1 #id .class-name2}

**Note:** The *hash mark* notation for ids or *period* notation for class names are very similar 
to the selectors used by many javascript libraries (such as jQuery or Scriptaculous).

Such notation concerns the following contents:

-   the *titles* ([§§](#C5)):

        ### My title content {#title-id .class}
        ### My title content ##### {#title-id .class}
        My title content {#title-id .class}
        -----------------

-   the *links* ([§§](#B5)):

        [link text](http://test.com/){#link-id .class}
        [link text](http://test.com/ "My title" var1=val var2="val1 val2"){#link-id .class}

-   the *images* ([§§](#B6) and [§§](#C12)):

        ![alt text](http://test.com/img.ext){#image-id .class}
        ![alt text](http://test.com/img.ext "My title" var1=val var2="val1 val2"){#image-id .class}

-   the *fenced code blocks* ([§§](#C6b)):

        ~~~{#block-id .class-name}
        code block content
        ~~~

        ~~~html{#block-id .class-name}
        code block content
        ~~~

-   the *references* ([§§](#D3)):

        A paragraph with referenced [link][link-id] and ![image][image-id].
        
        [link-id]: http://test.com/ {#link-id .class}
        [image-id]: http://test.com/img.ext {#image-id .class}

        A paragraph with referenced [link][link-id] and ![image][image-id].
        
        [link-id]: http://test.com/ "My title" var1=val var2="val1 val2" {#link-id .class}
        [image-id]: http://test.com/img.ext "My title" var1=val var2="val1 val2" {#image-id .class}

-   the *tables* ([§§](#C10)):

        |               | Grouping                    ||
        | First Header  | Second Header | Third header |
        | ------------- | ------------: | :----------: |
        | Content Cell  |  *Long Cell*                ||
        | Content Cell  | **Cell**      | **Cell**     |
        {#tableid .class}

        |               | Grouping                    ||
        | First Header  | Second Header | Third header |
        | ------------- | ------------: | :----------: |
        | Content Cell  |  *Long Cell*                ||
        | Content Cell  | **Cell**      | **Cell**     |
        {#tableid .class}[table caption]
    
    In the case of tables, the only restriction is that, if the table has a caption as defined
    at ([§§](#C10d)), the attributes information MUST be on the same line as the caption.


The usage of a user defined *ID* CAN be largely used for any type of content in an MDE document.
This allows to reference a part of a content for in-page links writing:

    This is a paragraph with an anchor{#my-anchor} I can access with a [link](#my-anchor) ...

Note that writing class names on the same model would not have sense as writer can't define
concerned span of content. Such a usage of class names in the middle of a content (outside
the content types listed above) MUST NOT be allowed and MUST NOT have any effect.

As developed in the *identifiers construction* section ([§§](#D7)), any *ID* defined in the
content MUST be used instead of automatic one (with, eventually, modifications to fit the
"slug" specifications).

**Implementation Note:** In an HTML rendering, the output MUST be a tag with user defined
class names as `class` attribute and *ID* as `id` attribute. In other output formats, some
class names SHOULD have an effect in the final rendering (by defining a special rendering
for common class names for instance).

#### D.6.b. Raw attributes {#D6b}

In some notations, writers can add raw attributes to contents. This basically concerns only
*links* ([§§](#B5)) and *images* ([§§](#B6) and [§§](#C12)).

The global rule for such a notation is that:

-   when the attribute value is unique, the simple notation `var=val` is allowed
-   when the attribute value is "long" (includes multiple words), the notation MUST
    use *double-quoted* values `"` : `var="val1 val2"`


### D.7. Identifiers construction for IDs {#D7}

For the construction of the *IDs* described at [§§](#A9), an MDE parser MUST use a constant 
"*slugification*" process. Trying to build these specifications, we found three third-parties
definitions useful:

-   the [Django "slug" field][django-slug] specification:

    > (https://docs.djangoproject.com/en/dev/glossary/#term-slug)
    A short label for something, containing only letters, numbers, underscores or hyphens.

-   the [HTML4 "id" attribute][html4-id] specification:

    > (http://www.w3.org/TR/html4/types.html#type-id)
    ID [...] tokens must begin with a letter ([A-Za-z]) and may be followed by any number 
    of letters, digits ([0-9]), hyphens ("-"), underscores ("_"), colons (":"), and periods (".").

-   the [W3C "id" attribute][w3c-id] definition:

    > (http://www.w3schools.com/tags/att_global_id.asp)
    [...] In HTML, all values are case-insensitive.

In conclusion, in MDE, the construction of IDs MUST follow the rules below:

-   a string all lower-case
-   containing *letters* `[a-z]`, *digits* `[0-9]`, *hyphens* `-`, *underscores* `_`, *colons* `:` and *periods* `.`

These rules MUST be applied when constructing an automatic *ID* AND when a user defined *ID* occurs
([§§](#D6)). When a writer specify an *ID* "by hand", parser MUST take that *ID* instead of creating an
automatic one, but the *ID* MUST be transformed to follow above specifications if it is not the case.

**Example:** The example below is given as a demonstration. The final "slugify" process is NOT part
of these specifications:

    ### This is a title
    // => id=this-is-a-title


### D.8. Automatic indexations {#D8}

### D.8.a. Table of contents {#D8a}

Any MDE parser MUST handle a table of contents, extracting at least all titles of a document.
Global document's structure MUST be able to use both titles notations ([§§](#C5)) to build a 
single table of contents.

To do so, any title MUST have a unique *ID* as reference (like the `id` attribute of an HTML tag)
and this ID MUST follow the specifications at [§§](#D7).


### D.8.b. Table of figures and tables {#D8b}

Any MDE parser MUST handle a table of figures and tables of the document, extracting the
following objects:

-   any *table* ([§§](#C10))
-   any *figure* ([§§](#C12))

To do so, any table and figure MUST have a unique *ID* as reference (like the `id` attribute of an HTML tag)
and this ID MUST follow the specifications at [§§](#D6).


### D.9. Implementers specifics {#D9}

This section will describe some features and rules the MDE's parsers MUST implement (except
where noted).

#### D.9.a. Error handling {#D9a}

MDE parsers MUST be prepared to handle syntax errors informing the writer about what caused
the error and, OPTIONALLY, how to fix it. The error information MAY be a simple phrase with
a line number or the tag's type that causes the error.

#### D.9.b. Structural tags {#D9b}

A parser SHOULD let the writer choose its rendering structure by allowing him to use *structural
tags* that SHOULD be replaced by corresponding block (mostly indexes) if it is defined and
not empty.

These tags are:

-   `TOC` for the *table of contents* ([§§](#D8a))
-   `TOF` for the *table of figures* ([§§](#D8b))
-   `NOTES` for the *footnotes* ([§§](#D5))
-   `GLOSSARY` for *glossary footnotes* only (lexicon - [§§](#D5b))
-   `BIBLIOGRPHY` for *citations footnotes* only (bibliographic index - [§§](#D5c))

The construction of such tag MAY follow these rules:

-   the name of the tag (from the list above) in capital letters
-   surrounded between percent sign `%` and curly brackets `{` and `}`
-   OPTIONAL spaces surrounding the tag name.

~~~
\{% TOC %\}
\{% TOF %\}
\{% NOTES %\}
\{% GLOSSARY %\}
\{%BIBLIOGRPHY%\}
~~~

#### D.9.c. User configuration {#D9c}

An MDE's parser SHOULD propose any user to define some preferences with a table of options.

#### D.9.d. Various {#D9d}

The rules described in this section are NOT part of the specifications, these are just ideas and
commonly used features.

##### D.9.d.1. Other file inclusion {#D9d1}

For facility, it seems to be a good idea to allow writers to include external files.

##### D.9.d.2. Critic markup {#D9d2}

As defined in *MultiMarkdown*, the **Critic Markup** rules CAN be useful when working on a Markdown
document with a team. It allows to keep an information about additions, modifications and deletions
in a content.

For a full information about the syntax, please see [criticmarkup.com][critic-markup].

**Implementation Note:** When allowing the CriticMarkup syntax, an MDE parser MUST be prepared to
handle different states like `old` and `new` and finally consider any modification as *validated*
for a final rendering (the `new` status MUST be the default).


Contribute {#contribute}
----------

This document and the MDE's specification are opened for any kind of discussion, argumentation, 
translation and any other modification.

If you'd like to leave feedback, please [open an appropriate issue on GitHub][package-issues].
You could first search in existing tickets if your comment does not already exists. If your
ticket concerns a specific rule, please include its reference in its title like `X.Y.Z. Ticket title ...`.

The source of this document is maintained under a GIT version-control repository publicly hosted on [GitHub][github].
If you want to participate in any way, just [fork and edit][github-fork-doc] the original repository 
and ask for a [pull request][github-pull-doc] opening the appropriate issue ticket. GitHub embeds 
many tools and procedures to allow a quick and simple "*fork/pull request*" process.

If you want to contribute by translating this document, follow the steps above and create a 
copy of the original `mde-manifest.md` file named like `mde-manifest.LN.md` where `LN` is
your language code following the [ISO 639-1 list][iso-639-1].

And finally, THANK YOU for being involved ;)


[wiki-markdown]: http://en.wikipedia.org/wiki/Markdown
[wiki-john-gruber]: http://en.wikipedia.org/wiki/John_Gruber
[wiki-aaron-swartz]: http://en.wikipedia.org/wiki/Aaron_Swartz
[package-home]: http://github.com/markdown-extended/manifest
[package-issues]: http://github.com/markdown-extended/manifest/issues
[daring-fireball]: http://daringfireball.net/
[michel-fortin]: http://michelf.com/
[fletcher-penney]: http://fletcherpenney.net/
[egil-hansen]: http://egilhansen.com
[john-macfarlane]: https://github.com/jgm
[e-piwi]: http://e-piwi.fr/
[markdown]: http://daringfireball.net/projects/markdown/
[markdown-extra]: https://michelf.ca/projets/php-markdown/
[multi-markdown]: http://fletcherpenney.net/multimarkdown/
[php-markdown-extra-extended]: http://github.com/egil/php-markdown-extra-extended
[php-markdown-extended]: http://github.com/piwi/markdown-extended
[standard-markdown-spec]: http://jgm.github.io/stmd/spec.html
[markdown-manual]: http://daringfireball.net/projects/markdown/syntax
[github]: http://github.com
[github-fork-doc]: http://help.github.com/articles/fork-a-repo
[github-pull-doc]: http://help.github.com/articles/using-pull-requests
[latex-maths-doc]: https://en.wikibooks.org/wiki/LaTeX/Mathematics
[w3c-html5-code-specifications]: http://dev.w3.org/html5/spec-author-view/the-code-element.html#the-code-element
[w3c-html5-pre-specifications]: http://dev.w3.org/html5/spec-author-view/the-pre-element.html#the-pre-element
[cc-by-3]: http://creativecommons.org/licenses/by/3.0/
[iso-639-1]: http://www.loc.gov/standards/iso639-2/php/code_list.php
[rfc-2119]: http://tools.ietf.org/html/rfc2119
[setext-markup]: http://docutils.sourceforge.net/mirror/setext.html
[atx-markup]: http://www.aaronsw.com/2002/atx/
[django-slug]: https://docs.djangoproject.com/en/dev/ref/models/fields/#slugfield
[html4-id]: http://www.w3.org/TR/html4/types.html#type-id
[w3c-id]: http://www.w3schools.com/tags/att_global_id.asp
[markdown-mark]: http://dcurt.is/the-markdown-mark
[critic-markup]: http://criticmarkup.com/