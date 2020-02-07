import {terser} from 'rollup-plugin-terser';
import resolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import postcss from 'rollup-plugin-postcss';
import scss from 'rollup-plugin-scss';

process.chdir(__dirname);

const defaultCfg = {
  input: './fusion.js',
  output: {
    file: './src/_resources/fusion.min.js',
    format: 'iife',
  },
  plugins: [
    resolve({browser: true, preferBuiltins: false}),
    commonjs(),
    terser(),
    scss({include: '*.scss'}),
    postcss({extract: true, minimize: true}),
  ],
};

export default [defaultCfg];
