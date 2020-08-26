import {terser} from 'rollup-plugin-terser';
import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import babel from '@rollup/plugin-babel';
import postcss from 'rollup-plugin-postcss';
import flexbugs from 'postcss-flexbugs-fixes';
import svgloader from 'rollup-plugin-svg';
import postcssPresetEnv from 'postcss-preset-env/index.js';

process.chdir(__dirname);

const defaultBrowsers = ['defaults', 'not ie > 0'];

const defaultCfg = {
  input:   './fusion.js',
  output:  {
    file:   './src/_resources/fusion.min.js',
    format: 'iife',
  },
  plugins: [
    //css
    postcss(
      {
        extract:  true,
        minimize: true,
        plugins:  [
          postcssPresetEnv({browsers: defaultBrowsers}),
        ],
      }),
    resolve({browser: true, preferBuiltins: false}),
    commonjs(),
    terser(),

    babel(
      {
        babelHelpers: 'bundled',
        babelrc:      false,
        exclude:      [/\/core-js\//],
        presets:      [
          [
            '@babel/preset-env',
            {
              corejs:      3,
              modules:     false,
              useBuiltIns: 'usage',
              targets:     defaultBrowsers,
            },
          ],
        ],
      }),
  ],
};

const ieBrowsers = ['ie > 9', '> 0.02%', 'last 2 versions', 'Firefox ESR'];
const ieConfig = {
  input:   './fusion_ie.js',
  output:  {
    file:   './src/_resources/fusion.ie.min.js',
    format: 'iife',
  },
  plugins: [
    //css
    postcss(
      {
        extract:  true,
        minimize: true,
        plugins:  [
          flexbugs(),
          postcssPresetEnv({browsers: ieBrowsers, autoprefixer: {grid: 'autoplace'}}),
        ],
      }),
    //js
    resolve({browser: true, preferBuiltins: false}),
    commonjs(),
    babel(
      {
        babelHelpers: 'bundled',
        babelrc:      false,
        exclude:      [/\/core-js\//],
        presets:      [
          [
            '@babel/preset-env',
            {
              corejs:      3,
              modules:     false,
              useBuiltIns: 'usage',
              targets:     ieBrowsers,
            },
          ],
        ],
      }),
    terser(),
    svgloader()
  ],
};

export default [defaultCfg, ieConfig];
