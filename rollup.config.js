import {terser} from 'rollup-plugin-terser';
import resolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import postcss from 'rollup-plugin-postcss';
import cleanCss from 'postcss-clean';
import replace from '@rollup/plugin-replace';

process.chdir(__dirname);

module.exports = {
  input:   './build.js',
  output:  {
    file:   './src/_resources/fusion.min.js',
    format: 'iife'
  },
  plugins: [
    replace({
      preventAssignment: true,
      'process.env.NODE_ENV': JSON.stringify('development')
    }),
    resolve({browser: true, preferBuiltins: false}),
    commonjs(),
    terser(),
    postcss({
      extract:  true,
      minimize: true,
      plugins:  [
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
};
