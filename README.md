# WDS Block Starter

[![buddy pipeline](https://app.buddy.works/webdevstudios/wds-block-starter/pipelines/pipeline/240874/badge.svg?token=2471ae60766a1e9a657f772e493188dde748aa18c236d0b1c325e80be13a2ac6 "buddy pipeline")](https://app.buddy.works/webdevstudios/wds-block-starter/pipelines/pipeline/240874)

A block starter for WebDevStudios projects. Includes support for Sass, PostCSS, WebDevStudios Coding Standards, and build tools like [Webpack](https://webpack.js.org), [Babel](https://babeljs.io), and [ESLint](https://eslint.org).

<a href="https://webdevstudios.com/contact/"><img src="https://webdevstudios.com/wp-content/uploads/2018/04/wds-github-banner.png" alt="WebDevStudios. Your Success is Our Mission."></a>

## Requirements

[Node](https://nodejs.org/en/) (`12.x`). We highly recommend [NVM](https://github.com/nvm-sh/nvm) so you can easily switch between Node versions. You'll also need [Composer](https://getcomposer.org/).

## Automatic Scaffolding

Easily scaffold a block for the WordPress block editor via CLI. You just need to provide the `Namespace/BlockName`.

  ```bash
  $ npm init @webdevstudios/wds-block WebDevStudios/TodoList
  $ cd todo-list
  $ npm start
  ```
See [@webdevstudios/create-block](https://github.com/WebDevStudios/create-block) for more information and options.

## Manual Installation

Install dependencies

```bash
npm install
```

## Development

To watch for changes.

```bash
npm start
```

To build the production version of the plugin

```bash
npm run build
```

### Other handy commands

Lint JS

```bash
npm run lint:js
```

Lint CSS

```bash
npm run lint:css
```

Lint PHP

```bash
npm run lint:php
```

For more info on the WordPress Block API, check out the [Gutenberg Handbook](https://developer.wordpress.org/block-editor/).

## Contributing and Support

Your contributions and [support tickets](https://github.com/WebDevStudios/wds-block-starter/issues) are welcome. Please see our [guidelines](https://github.com/WebDevStudios/wds-block-starter/blob/master/.github/CONTRIBUTING.md) before submitting a pull request.
