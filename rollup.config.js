import {terser} from 'rollup-plugin-terser';
import resolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import postcss from 'rollup-plugin-postcss';
import cleanCss from 'postcss-clean';
import postcssDiscardComments from 'postcss-discard-comments';

process.chdir(__dirname);

module.exports = [
  {
    input:   './build.js',
    output:  {
      file:   './src/_resources/fusion.min.js',
      format: 'iife'
    },
    plugins: [
      resolve({browser: true, preferBuiltins: false}),
      commonjs(),
      terser({
        format: {
          comments: false
        }
      }),
      postcss({
        extract:  true,
        minimize: true,
        plugins:  [
          postcssDiscardComments({removeAll: true}),
          cleanCss({
            level: {
              1: {
                roundingPrecision: 3
              }
            }
          })
        ]
      })
    ]
  },
  {
    input:   './demo/src/main.js',
    output:  {
      file:   './demo/src/_resources/demo.min.js',
      format: 'iife'
    },
    plugins: [
      resolve({browser: true, preferBuiltins: false}),
      commonjs(),
      terser({
        format: {
          comments: false
        }
      }),
      postcss({
        extract:  true,
        minimize: true,
        plugins:  [
          postcssDiscardComments({removeAll: true}),
          cleanCss({
            level: {
              1: {
                roundingPrecision: 3
              }
            }
          })
        ]
      })
    ]
  }
];
