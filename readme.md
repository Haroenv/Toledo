# Serverside Webscripten 2: Project

> The technology stack in this project is chosen by the exercise; not by myself

# Setting it up

Fill in the `.env` with an app key, your mailgun settings

```
$ ./setup.sh serve
```

And it should be open at [localhost:8000](http://localhost:8000).

# Considerations

* courses aren't private
    * since I think it's useful to look at other courses from time to time, it's nice to be able
* you need an invitation code to join
    * analogous to real Toledo, see the invitation code when you start a course
* only u...@kuleuven.be or r...@student.kuleuven.be addresses
    * no odisee ...
* resetting password works
    * when you enter a valid mailgun key in `.env`

# Useful

code | what
---|---
`{{ dd(get_defined_vars(['__data'])) }}` | get defined vars in blade

# License

Toledo as a name is property of KU Leuven.

Haroen Viaene

Apache 2.0
